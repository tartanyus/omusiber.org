<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tool;
use App\User;
use App\CategoryTool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocsController extends Controller
{
    public function index(){
        $datas = Category::all();
        $isEditor = false;
        $isAdmin = false;
        if(Auth::check() && User::find(Auth::id())->is_editor == 1){
            $isEditor = true;
        }
        if(Auth::check() && User::find(Auth::id())->is_admin == 1){
            $isAdmin = true;
        }
        return view('documents.index',compact('datas'))->with('isEditor',$isEditor)->with('isAdmin',$isAdmin);
    }

    public function displayTool($tool){
        $isEditor = false;
        $isAdmin = false;
        if(Auth::check() && User::find(Auth::id())->is_editor == 1){
            $isEditor = true;
        }
        if(Auth::check() && User::find(Auth::id())->is_admin == 1){
            $isAdmin = true;
        }
        $toolInfo = Tool::where('tool',$tool)->first();
        $resources = explode(',',$toolInfo->resources);
        $categories = Tool::find($toolInfo->id)->categories;
        return view('documents.tool',compact('toolInfo','categories','resources'))->with('isEditor',$isEditor)->with('isAdmin',$isAdmin);
    }

    public function addTool(){
        $categories = Category::all();
        return view('documents.add',compact('categories'));
    }

    public function addCategory(){
        $categories = Category::all();
        return view('documents.add-category',compact('categories'));
    }

    public function addCategorytoDB(Request $request){
        $request->validate([
           'cat-name' => 'required|max:255',
           'cat-cat' => 'required|max:255',
           'cat-icon' => 'required|max:255'
        ]);
        if(Category::where('category',request('cat-cat'))->count() >= 1){
          return "Böyle bir kategori var.";
        }
        $category = new Category;
        $category->category = request('cat-cat');
        $category->categoryName = request('cat-name');
        $category->icon = request('cat-icon');
        $category->save();
        return "Başarılı";

    }

    public function editTool($tool){
        $categories = Category::all();
        $toolInfo = Tool::where('tool',$tool)->first();
        $tool_categories = $toolInfo->categories;
        $tool_cats = array();
        foreach ($tool_categories as $tool_category){
            array_push($tool_cats,$tool_category->category);
        }
        return view('documents.edit',compact('categories','tool_cats','toolInfo'));
    }

    public function updateTool(Request $request,$tool){
        $categories = request('category');
        $catIDs = array();
        foreach ($categories as $category){
            $catID = Category::where('category',$category)->first()->id;
            array_push($catIDs,$catID);
        }
        $toolInfo = Tool::where('tool',$tool)->first();
        $toolID = $toolInfo->id;
        CategoryTool::where('tool_id',$toolID)->delete();
        foreach ($catIDs as $cat){
          $relationship = new CategoryTool;
          $relationship->category_id = $cat;
          $relationship->tool_id = $toolID;
          $relationship->save();    // Relationship saved
        }
        $toolInfo->tool = request('tool-tool');
        $toolInfo->toolName = request('tool-name');
        $toolInfo->description = request('tool-content');
        $toolInfo->resources = request('tool-resources');
        $toolInfo->save();
        return redirect('/docs/tool/'.$tool);
    }

    public function store(Request $request){
        $request->validate([
           'category' => 'required',
           'tool-tool' => 'required|max:255',
           'tool-name' => 'required|max:255',
           'tool-content' => 'required',
           'tool-resources' => 'required',
        ]);
        $categories = request('category');
        $catIDs = array();
        foreach ($categories as $category){
            $catID = Category::where('category',$category)->first()->id;
            array_push($catIDs,$catID);
        }
        if(Tool::where('tool',request('tool-tool'))->count() >= 1){
          return "Böyle bir tool var";
        }
        $tool = new Tool;
        $tool->tool = request('tool-tool');
        $tool->toolName = request('tool-name');
        $tool->description = request('tool-content');
        $tool->resources = request('tool-resources');
        $tool->save();    // Tool saved
        $toolID = Tool::where('tool',request('tool-tool'))->first()->id;
        foreach ($catIDs as $cat){
          $relationship = new CategoryTool;
          $relationship->category_id = $cat;
          $relationship->tool_id = $toolID;
          $relationship->save();    // Relationship saved
        }
        return redirect('/docs/tool/'.$tool->tool);

        //$request->file('photo')->move('/public/assets/images/tools/'.$tool, $fileName);

    }
}
