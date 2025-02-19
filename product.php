<?php
    session_start();
    require_once 'header.php';
    require_once 'connect-database.php';
?>
<section class="product-container">
    <?php
        if (isset($_GET['urun'])) {
            $urunId = $_GET['urun'];
            $urun = $db->prepare("SELECT * FROM urunler WHERE urun_id = :urun_id");
            $urun->bindParam(':urun_id', $urunId, PDO::PARAM_INT);
            $urun->execute();

            while ($urunCek = $urun->fetch(PDO::FETCH_ASSOC)) {
                // Resim işleme
                $urunResim2 = $urunCek['urun_resim'];
                $length = strlen($urunResim2);
                for ($i = $length - 1; $i >= 0; $i--) {
                    if ($urunResim2[$i] == '1') {
                        $urunResim2[$i] = '2';
                        break;
                    }
                }

                // Ürün bilgilerini HTML'ye yazdırma
                echo '
                    <div class="product-image">
                        <div class="slidable-images">
                            <img src="' . $urunCek['urun_resim'] . '">
                            <img src="' . $urunResim2 . '">
                        </div>
                        <div class="product-prev-button product-img-buttons">
                            <i class="fa-solid fa-angle-left"></i>
                        </div>
                        <div class="product-next-button product-img-buttons">
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                    </div>
                    <div class="product-page-description">
                        <div class="product-title">' . $urunCek['urun_isim'] . '</div>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            &nbsp;4 Değerlendirme
                        </div>
                        <div class="product-price">' . $urunCek['urun_fiyat'] . ' TL</div>
                        <div style="display: flex; flex-direction: column;">
                            <p style="margin: 0; margin-left: 5px;">Beden</p>
                            <div class="product-size">
                                <div class="product-size-box ' . (!$urunCek['urun_beden_xs'] ? "not-available" : "") . '">XS</div>
                                <div class="product-size-box ' . (!$urunCek['urun_beden_s'] ? "not-available" : "") . '">S</div>
                                <div class="product-size-box ' . (!$urunCek['urun_beden_m'] ? "not-available" : "") . '">M</div>
                                <div class="product-size-box ' . (!$urunCek['urun_beden_l'] ? "not-available" : "") . '">L</div>
                                <div class="product-size-box ' . (!$urunCek['urun_beden_xl'] ? "not-available" : "") . '">XL</div>
                            </div>
                        </div>
                    
                ';
            }
        }
    ?>
            <div class="cart-box">
                <div class="cart-increase-decrease-box">
                    <button class="cart-increase-button" onclick="increase()">+</button>
                    <div class="product-number">1</div>
                    <button class="cart-decrease-button" onclick="decrease()">-</button>
                </div>
                <button class="add-cart-button">Sepete Ekle</button>
            </div>
            <div class="other-box">
                <img src="images/iade.webp" alt="" style="height: 40px;">Ücretsiz İade
                <img src="images/kargo.webp" alt="">Hızlı Kargo
                <img src="images/orijinal.webp" alt="">Orijinal Ürünler
            </div>
        </div>
    </section>
    <?php
    require_once 'footer.php';
?>