<?php
session_start();
require_once 'header.php';
require_once 'connect-database.php';
?>
    <main>
        <div class="offer">
            <div class="offer-name">S-SHOP KIŞ İNDİRİMİ BAŞLIYOR</div>
            <a href="#" class="offer-image"><img src="images/main.webp" alt=""></a>
        </div>
        <section class="new-products">
            <div class="prev-button prev-next-buttons"><i class="fa-solid fa-angle-left"></i></div>
            <div class="next-button prev-next-buttons"><i class="fa-solid fa-angle-right"></i></div>
            <h4>Yeni Ürünler</h4>
            <div class="product-wrapper">
                <div class="new-product-content">
                    <?php
                        $urun=$db->prepare("SELECT * from urunler");
                        $urun->execute();
                        while($urunCek=$urun->fetch(PDO::FETCH_ASSOC)){
                            echo '
                            <a href="product.php?urun='.$urunCek['urun_id'].'" class="new-product">
                                <img src="'.$urunCek['urun_resim'].'" class="'.$urunCek['urun_tur'].' '.$urunCek['urun_beden'].' '.$urunCek['urun_stok'].'" alt="" class="product-image">
                                <div class="product-description">
                                    <div class="product-name product-title">'.$urunCek['urun_isim'].'</div>
                                    <div class="product-price">'.$urunCek['urun_fiyat'].' TL </div>
                                </div>
                                <button class="new-products-cart-box">Sepete Ekle</button>
                            </a>
                            ';
                        }
                    ?>
                </div>
            </div>
        </section>
        <section class="description">
            <section class="description-content">
                <img src="images/ogrenci.webp" alt="">
                <div class="description-text">
                    <h5>S-SHOP Markasından Öğrencilere Özel %25 İndirim!</h5>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta, iste ducimus error perferendis nulla corrupti rem placeat nam voluptate quo illum distinctio labore doloribus, nostrum aspernatur! Placeat quis ad alias?</p>
                </div>
            </section>
            <section class="description-content">
                <img src="images/cevre.webp" alt="">
                <div class="description-text">
                    <h5>Çevre Dostu Ürünler Üretiyoruz</h5>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta, iste ducimus error perferendis nulla corrupti rem placeat nam voluptate quo illum distinctio labore doloribus, nostrum aspernatur! Placeat quis ad alias?</p>
                </div>
            </section>
            <section class="description-content">
                <img src="images/moda.webp" alt="">
                <div class="description-text">
                    <h5>İstenen Tarz Burada</h5>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta, iste ducimus error perferendis nulla corrupti rem placeat nam voluptate quo illum distinctio labore doloribus, nostrum aspernatur! Placeat quis ad alias?</p>
                </div>
            </section>
        </section>
    </main>
<?php
    require_once 'footer.php';
?>