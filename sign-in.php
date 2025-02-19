<?php
    session_start();
    require_once "header.php";
?>
    <main>
        <?php

            if($_GET['cikis']=="ok"){
                unset($_SESSION['isim']);
                header("location:header.php?reflesh=ok");
                
            }

            if(isset($_SESSION['isim'])){?>
                <div class="account-container">
                    <a class="account-option"><i class="fa-solid fa-user"></i>&nbsp;Hesap Ayarları</a>
                    <a class="account-option"><i class="fa-solid fa-cart-shopping"></i>&nbsp;Siparişlerim</a>
                    <a class="account-option"><i class="fa-solid fa-phone"></i>&nbsp;Bize Ulaş</a>
                    <a href="sign-in.php?cikis=ok" class="account-option"><i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;Oturumu Kapat</a>
                </div>
            <?php
            }
            else{
        ?>
        <section class="sign-in-box">
        <?php
                if(isset($_GET['id'])){
                    if($_GET['id']=='hata'){
                        echo '
                        <div class="error-box">
                            Hatalı Giriş Lütfen Tekrar Deneyin
                        </div>';
                }
                }
                if($_GET['dogrulama']=="hata"){
                    echo '
                    <div class="error-box">
                        Şifre doğrulaması hatalı
                    </div>';
                }
            ?>
            <div class="headers">
                <h4 style="font-size: 25px;" class="sign" onclick="signIn()" id="sign-in-button">Giriş Yap</h4>
                <h4 class="sign" onclick="signUp()" id="sign-up-button">Kayıt Ol</h4>
            </div>
            <form action="sign-up-process.php" method="post" id="sign-in-form">
                <label>Mail Adresi:</label>
                <input type="mailto" name="kullanicilar_mail" required>
                <hr>
                <label>Şifre:</label>
                <input type="password" name="kullanicilar_sifre" required>
                <hr>
                <input type="submit" name="sign-in" id="submit" value="Gönder">
            </form>
            <form action="sign-up-process.php" method="post" id="sign-up-form" style="display: none;">
                <label>İsim:</label>
                <input type="text" name="kullanicilar_isim" required>
                <hr>
                <label>Soyisim:</label>
                <input type="text" name="kullanicilar_soyisim" required>
                <hr>
                <label>Mail Adresi:</label>
                <input type="mailto" name="kullanicilar_mail" required>
                <hr>
                <label>Şifre:</label>
                <input type="password" name="kullanicilar_sifre" required>
                <hr>
                <label>Şifre Doğrula:</label>
                <input type="password" name="kullanicilar_author" required>
                <hr>
                <input type="submit" name="submit" id="submit" value="Gönder">
            </form>
        </section>
        <?php }?>
    </main>
    <footer>
        <section class="footer-content">
            <section class="footer-content-boxes">
                <h6>Müşteri Hizmetleri</h6>
                <ul>
                    <li><a href="">İletişim</a></li>
                    <li><a href="">Sık Sorulan Sorular</a></li>
                    <li><a href="">Mesafeli Satış Sözleşmesi</a></li>
                    <li><a href="">Güvenlik ve Gizlilik</a></li>
                    <li><a href="">İade ve Değişim</a></li>
                </ul>
            </section>
            <section class="footer-content-boxes">
                <h6>S-SHOP</h6>
                <ul>
                    <li><a href="">Hakkımızda</a></li>
                    <li><a href="">Blog</a></li>
                    <li><a href="">Basın</a></li>
                </ul>
            </section>
            <section class="footer-content-boxes">
                <h6>Hesabım</h6>
                <ul>
                    <li><a href="">Üye Ol</a></li>
                    <li><a href="">Giriş Yap</a></li>
                    <li><a href="">Siparişlerim</a></li>
                    <li><a href="">Sipariş Takip</a></li>
                    <li><a href="">Favorilerim</a></li>
                </ul>
            </section>
        </section>
        <section class="social-media">
            <a href=""><i class="fa-brands fa-facebook"></i></a>
            <a href=""><i class="fa-brands fa-x-twitter"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
        </section>
    </footer>
    <script>

//GİRİŞ YAP KAYIT OL ARASI GEÇİŞ
function signUp(){
    document.querySelector("#sign-in-form").style.display="none"
    document.querySelector("#sign-up-form").style.display="flex"
    document.querySelector("#sign-in-button").style.fontSize="15px"
    document.querySelector("#sign-up-button").style.fontSize="25px"

}
function signIn(){
    document.querySelector("#sign-in-form").style.display="flex"
    document.querySelector("#sign-in-button").style.fontSize="25px"
    document.querySelector("#sign-up-form").style.display="none"
    document.querySelector("#sign-up-button").style.fontSize="15px"
}
    </script>
</body>
</html>