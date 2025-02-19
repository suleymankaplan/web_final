<?php
    session_start();
    if(isset($_SESSION['isim'])&&$_SESSION['isim']=="admin"){
    require_once "admin-header.php";
?>
<h1>Ürün Ekleme</h1>
<form class="product-add" action="admin-product-add-process.php" method="post">
    <div>
        <label>Ürün resminin ismini giriniz:</label>
        <input type="text" name="urun_resim">
    </div>
    <div>
        <label>Ürünün ismini giriniz:</label>
        <input type="text" name="urun_isim">
    </div>
    <div>
        <label>Ürünün Fiyatını Giriniz:</label>
        <input type="text" name="urun_fiyat">
    </div>
    <div>
        <label>Ürünün Türünü Giriniz:</label>
        <input type="text" name="urun_tur">
    </div>
    <div>
        <label>Ürünün Stok Durumunu Giriniz:</label>
        <input type="text" name="urun_stok">
    </div>
    <div>
        <label>Ürünün Rengini Giriniz:</label>
        <input type="text" name="urun_renk">
    </div>
    <div>
        <label>Var olan bedenleri seçiniz:</label>
        <div>
            <input type="checkbox" name="urun_beden_xs"><p>XS</p>
            <input type="checkbox" name="urun_beden_s"><p>S</p>
            <input type="checkbox" name="urun_beden_m"><p>M</p>
            <input type="checkbox" name="urun_beden_l"><p>L</p>
            <input type="checkbox" name="urun_beden_xl"><p>XL</p>
        </div>
    </div>
    <input type="submit" name="submit" value="Kaydet" class="save-button">
</form>
<?php
    if($_GET['urun']){
        echo "ürün başarıyla eklendi";
    }
?>
<?php
    require_once "admin-footer.php";
}
else{
    header("location:../index.php");
}
?>