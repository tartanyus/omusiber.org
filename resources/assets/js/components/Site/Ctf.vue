<template>
  <div class="card">
        <header>
            <time datetime="2018-05-15T19:00">10 Mart 2018</time>
            <div class="logo">
                <img src="assets/images/logo.png"/>
            </div>
            <div class="sponsor"><a href="https://poinetr.com/">PoineTR</a></div>
        </header>
        <div class="announcement" v-if="!sss">
            <h1>OMUCTF'18</h1>
            <h3>Eğlenceli ve bilgilendirici bir siber güvenlik yarışması</h3>
            <h3 class="italic"><a href="https://ctf.omusiber.org">Yarışma sona ermiştir!</a></h3>
            <a href="#" class="btn btn-sm sss" @click="sss = !sss">Sık Sorulan Sorular</a>
                     
        </div>
        <div class="sss" v-if="sss">
            <a href="#" class="btn btn-sm sss back" @click="sss = !sss">Geri</a>
            <h1 class="sss">Sık Sorulan Sorular</h1>
            <div class="container">
                <div class="soru">
                    <h3>OMUCTF'18 Nedir?</h3>
                    <p>
                        CTF (Capture the Flag) siber güvenlik alanında düzenlenen yeni bilgiler edinmek, var olan bilgileri tazelemek isteyenlerin katılabileceği, 
                        araştırmaya yönlendiren, eğlenirken öğrenmeyi hedefleyen bir yarışmadır.
                        OMUCTF'18, PoineTR'nin katkılarıyla Ondokuz Mayıs Üniversitesi Siber Güvenlik Topluluğu tarafından düzenlenen iki aşamalı bir CTF yarışmasıdır. 
                        İlk aşama online olup, 9 Mart'ı 10 Mart'a bağlayan gece 00.00'da başlayacaktır ve 23.59'a kadar sürecektir. İlk aşamada başarılı olan ilk 8 takım 
                        Samsun'a davet edilip Nisan'da planlanan bir tarihte aynı ortamda yarışmanın ikinci aşamasını tamamlayacaktır. 
                    </p>
                </div>
                <div class="soru">
                    <h3>OMUCTF'18'e neden katılmalıyım?</h3>
                    <p>CTF'de dereceye girerek; üniversitemiz bünyesinde düzenlenecek ikinci aşama olan final yarışmasına katılma şansı yakalayabilir, ikinci aşama ile aynı tarihlerde düzenlenecek konferansla bilişim dünyasının alanında uzman birbirinden 
                        değerli konuşmacıları ile tanışma fırsatı bulabilirsiniz.</p>
                </div>
                <div class="soru">
                    <h3>Kaç kişilik ekiple katılabilirim?</h3>
                    <p>Yarışmaya en fazla 3 kişilik ekiple katılabilirsiniz. İsterseniz bireysel katılım da gösterebilirsiniz.</p>
                </div>
                <div class="soru">
                    <h3>Nasıl kayıt olabilirim?</h3>
                    <p>ctf.omusiber.org adresinden kayıt olduktan sonra, mail adresinize gelen onay linki ile kaydı onaylamanız gerekmektedir. Daha sonra takım arkadaşlarınızla kullanıcı adı ve şifrenizi paylaşarak yarışma zamanı soruları beraber çözebilirsiniz.</p>
                </div>
                <div class="soru">
                    <h3>Katılım ücreti ne kadar?</h3>
                    <p>Katılım tamamen ücretsizdir. Online CTF'de finalist olan takımlar OMUCTF'18 kapsamında misafir edilerek yol ve barınma giderleri karşılanacaktır.</p>
                </div>
                <div class="soru">
                    <h3>Yarışma süresi ne kadar?</h3>
                    <p>İlk aşama, tam olarak 9 Mart'ı 10 Mart'a bağlayan gece yani 10 Mart 00.00'da başlayacak ve 23.59'a kadar devam edecektir.</p>
                </div>
                <div class="soru">
                    <h3>Şehir dışından katılabilir miyim?</h3>
                    <p>Elbette. İlk aşama online olduğu için istediğiniz şehirden katılabilirsiniz.</p>
                </div>
                <div class="soru">
                    <h3>Ödüller neler?</h3>
                    <p>Ödüller henüz belirlenmedi.</p>
                </div>
                <div class="soru">
                    <h3>İkinci aşama nasıl olacak ?</h3>
                    <p>İlk aşamayı başarıyla geçtikten sonra, ikinci aşamada yani burada sürpriz bir eleme sistemiyle karşılaşacaksınız. Henüz açıklamıyoruz fakat eğleneceğinize eminiz!</p>
                </div>
                <div class="soru">
                    <p>Düzenlemeler için burayı takip edebilirsiniz. Sorularınız için siber@omu.edu.tr üzerinden veya sosyal medya hesaplarımızdan bizimle iletişime geçebilirsiniz!</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  data(){
      return {
          sss: false,
      }
  }
}
</script>


<style>
    @import url('https://fonts.googleapis.com/css?family=Asap+Condensed:600i,700');

    ::-webkit-scrollbar
    {
        width: 0px;
    }
    ::-webkit-scrollbar-track-piece
    {
        background-color: transparent;
        -webkit-border-radius: 6px;
    }
    
    body {
    background: #fafafa;
    display: flex;
    text-transform: uppercase;
    font-family: 'Asap Condensed', sans-serif;
    }

    h1 {
    font-size: 60px;
    }
    h3 {
    font-size: 26px;
    }

    .italic {
    font-style: italic;
    }

    .card {
    position: relative;
    margin: auto;
    height: 100%;
    width: 100%;
    text-align: center;
    /*background: linear-gradient(#E96874, #6E3663, #2B0830);*/
    background: linear-gradient(#060202, #319289, #0c323c);
    border-radius: 2px;
    box-shadow: 0 6px 12px -3px rgba(0,0,0,.3);
    color: #fff;
    padding: 30px;
    }

    .card header {
    position: absolute;
    top: 31px;
    left: 0;
    width: 100%;
    padding: 0 10%;
    transform: translateY(-50%);
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    align-items: center;
    }

    .card header > *:first-child {
    text-align: left;
    }
    .card header > *:last-child {
    text-align: right;
    }

    .logo {
    font-size: 24px;
    position: relative;
    }
    .logo:before,
    .logo:after {
    content: '';
    position: absolute;
    top: 50%;
    border-top: 3px solid currentColor;
    transform: translateY(-50%);
    }

    .logo span {
    display: block;
    position: absolute;
    width: 100%;
    top: calc(50% - 1px);
    }

    .announcement, div.sss {
    position: relative;
    border: 3px solid currentColor;
    border-top: 0;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    }

    .announcement:before,
    .announcement:after, div.sss::before, div.sss::after {
    content: '';
    position: absolute;
    top: 0px;
    border-top: 3px solid currentColor;
    height: 0;
    width: 15px;
    }
    .announcement:before, div.sss::before {
    left: -3px;
    }
    .announcement:after, div.sss::after {
    right: -3px;
    }

    * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    }

    html, body {
    height: 100%;
    }

    a,
    a:visited,
    a:focus,
    a:active,
    a:link {
    text-decoration: none;
    outline: 0;
    }

    a {
    color: currentColor;
    transition: .2s ease-in-out;
    }

    h1, h2, h3, h4 {
    margin: .15em 0;
    }

    ul {
    padding: 0;
    list-style: none;
    }

    img {
    vertical-align: middle;
    margin-top: 20px;
    height: auto;
    width: 20%;
    }

    h3.italic {
        font-size: 18px;
    }

    div.sss .container {
        max-height: 300px;
        margin: 0 10%;
        overflow-y: auto;
    }

    a.sss {
        border: 3px solid #e0c94d;
        padding: 15px;
        margin: 20px;
        transition: all ease .6s;
    }

    a.sss:hover {
        background: #752233;
        border-color: #fff;
        transition: all ease .6s;
    }

    a.back {
        left: 0;
        top: 0;
        position: absolute;
    }

    div.sss .soru {
        margin: 20px 0;
    }

    div.sss .soru h3,div.sss .soru p {
        width: 100%;
        text-align: left;
    }

    div.sss .soru h3 {
        font-size: 21px;
    }

    div.sss .soru p {
        font-size: 14px;
        text-transform: initial;
    }

    div.sss h1.sss {
        font-size: 52px;
    }

    /* Responsive */

    @media all and (max-width: 430px){
        img {
            width: 60%;
        }

        .card header > *:first-child,.card header > *:last-child {
            margin:0 10px;
        }

        div.sss h1.sss {
            font-size: 30px;
        }
    }

</style>
