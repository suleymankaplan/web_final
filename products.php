<?php
    session_start();
    require_once 'header.php';
    if($_GET['sifirla']=="ok"){
        unset($_SESSION['tur']);
        unset($_SESSION['beden']);
        unset($_SESSION['stok']);
        unset($_SESSION['renk']);
    }
?>
    <div class="hood"><h1>Tüm Ürünler</h1></div>
    <main class="products-main">
<form class="filters" method="post" action="filter.php">
    <div class="filter">
        <a>Alt Kategoriler<i class="fa-solid fa-angle-down"></i></a>
        <div class="filter-content" style="display: none;">
            <div><input class="filter-size" type="checkbox" name="tur[]" value="tisort" <?= isset($_SESSION['tur']) && in_array('tisort', $_SESSION['tur']) ? 'checked' : '' ?>><label for="">Tişört</label></div>
            <div><input class="filter-size" type="checkbox" name="tur[]" value="hoodie" <?= isset($_SESSION['tur']) && in_array('hoodie', $_SESSION['tur']) ? 'checked' : '' ?>><label for="">Hoodie</label></div>
        </div>
    </div>
    <div class="filter">
        <a>Beden<i class="fa-solid fa-angle-down"></i></a>
        <div class="filter-content" style="display: none;">
            <div><input class="filter-size" name="beden[]" type="checkbox" value="xs" <?= isset($_SESSION['beden']) &&in_array('xs', $_SESSION['beden']) ? 'checked' : '' ?>><label for="">XS</label></div>
            <div><input class="filter-size" name="beden[]" type="checkbox" value="s" <?= isset($_SESSION['beden']) && in_array('s', $_SESSION['beden']) ? 'checked' : '' ?>><label for="">S</label></div>
            <div><input class="filter-size" name="beden[]" type="checkbox" value="m" <?= isset($_SESSION['beden']) && in_array('m', $_SESSION['beden']) ? 'checked' : '' ?>><label for="">M</label></div>
            <div><input class="filter-size" name="beden[]" type="checkbox" value="l" <?= isset($_SESSION['beden']) && in_array('l', $_SESSION['beden']) ? 'checked' : '' ?>><label for="">L</label></div>
            <div><input class="filter-size" name="beden[]" type="checkbox" value="xl" <?= isset($_SESSION['beden']) && in_array('xl', $_SESSION['beden']) ? 'checked' : '' ?>><label for="">XL</label></div>
        </div>
    </div>
    <div class="filter">
        <a>Stok Durumu<i class="fa-solid fa-angle-down"></i></a>
        <div class="filter-content" style="display: none;">
            <div><input class="filter-size" name="stok[]" type="checkbox" value="stokta" <?= isset($_SESSION['stok']) && in_array('stokta', $_SESSION['stok']) ? 'checked' : '' ?>><label for="">Stokta</label></div>
            <div><input class="filter-size" name="stok[]" type="checkbox" value="stokta-yok" <?= isset($_SESSION['stok']) && in_array('stokta-yok', $_SESSION['stok']) ? 'checked' : '' ?>><label for="">Stokta Yok</label></div>
        </div>
    </div>
    <div class="filter">
        <a>Renk<i class="fa-solid fa-angle-down"></i></a>
        <div class="filter-content" style="display: none;">
            <div><input class="filter-size" name="renk[]" type="checkbox" value="siyah" <?= isset($_SESSION['renk']) && in_array('siyah', $_SESSION['renk']) ? 'checked' : '' ?>><label for="">Siyah</label></div>
            <div><input class="filter-size" name="renk[]" type="checkbox" value="sari" <?= isset($_SESSION['renk']) && in_array('sari', $_SESSION['renk']) ? 'checked' : '' ?>><label for="">Sarı</label></div>
            <div><input class="filter-size" name="renk[]" type="checkbox" value="beyaz" <?= isset($_SESSION['renk']) && in_array('beyaz', $_SESSION['renk']) ? 'checked' : '' ?>><label for="">Beyaz</label></div>
            <div><input class="filter-size" name="renk[]" type="checkbox" value="mavi" <?= isset($_SESSION['renk']) && in_array('mavi', $_SESSION['renk']) ? 'checked' : '' ?>><label for="">Mavi</label></div>
        </div>
    </div>
    <a class="filter-reset" href="products.php?sifirla=ok">Filtreyi Sıfırla</a>
    <button class="filter-apply" type="submit" name="filter-submit">Uygula</button>
</form>

        <section class="product-container">
            <?php
                require_once "connect-database.php";

                if(isset($_GET['filter'])){
                    if($_GET['filter']=="selected"){
                        $urun=$db->prepare("SELECT * from urunler WHERE ".$_GET['filters']);
                        $urun->execute();
                        while($urunCek=$urun->fetch(PDO::FETCH_ASSOC)){
                            echo '
                            <a class="product-box" href="product.php?urun='.$urunCek['urun_id'].'">
                                <img src="'.$urunCek['urun_resim'].'" class="'.$urunCek['urun_tur'].' '.$urunCek['urun_beden'].' '.$urunCek['urun_stok'].'">
                                <div class="product-description">
                                    <p>'.$urunCek['urun_isim'].'</p>
                                    <p>'.$urunCek['urun_fiyat'].' TL </p>
                                    <button class="add-cart-button">Sepete Ekle</button>
                                </div>
                            </a>'; 
                        }
                        if($urunCek==null){
                            echo '<div class="sonuc-bulunamadi">Aradığınız filtrelere uygun sonuç bulunamadı :p</div>';
                        }
                    }
                }
                else{
                    $urun=$db->prepare("SELECT * from urunler");
                    $urun->execute();
                    while($urunCek=$urun->fetch(PDO::FETCH_ASSOC)){
                        echo '
                        <a class="product-box" href="product.php?urun='.$urunCek['urun_id'].'">
                            <img src="'.$urunCek['urun_resim'].'" class="'.$urunCek['urun_tur'].' '.$urunCek['urun_beden'].' '.$urunCek['urun_stok'].'">
                            <div class="product-description">
                                <p>'.$urunCek['urun_isim'].'</p>
                                <p>'.$urunCek['urun_fiyat'].' TL </p>
                                <button class="add-cart-button">Sepete Ekle</button>
                            </div>
                        </a>';
                    }
                }
            ?>
        </section>
    </main>
    <?php
    require_once 'footer.php';
?>