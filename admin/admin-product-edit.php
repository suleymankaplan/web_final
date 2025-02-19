<?php
    session_start();
    if(isset($_SESSION['isim'])&&$_SESSION['isim']=="admin"){
    require_once "admin-header.php";
    require_once "../connect-database.php";
    $urunlerSor=$db->prepare("SELECT * from urunler where urun_id=:id");
    $urunlerSor->execute(array(
        'id'=>$_GET['urun_id']
    ));
    $urunlerCek=$urunlerSor->fetch(PDO::FETCH_ASSOC);
?>
<form class="product-add" action="admin-product-add-process.php" method="post">
    <label>Ürün Resminin İsmini Giriniz:</label>
    <input type="text" name="urun_resim" value="<?php echo $urunlerCek['urun_resim']?>">
    <label>Ürünün İsmini Giriniz:</label>
    <input type="text" name="urun_isim" value="<?php echo $urunlerCek['urun_isim']?>">
    <label>Ürünün Fiyatını Giriniz:</label>
    <input type="text" name="urun_fiyat" value="<?php echo $urunlerCek['urun_fiyat']?>">
    <label>Ürünün Türünü Giriniz:</label>
    <input type="text" name="urun_tur" value="<?php echo $urunlerCek['urun_tur']?>">
    <label>Ürünün Stok Durumunu Giriniz:</label>
    <input type="text" name="urun_stok" value="<?php echo $urunlerCek['urun_stok']?>">
    <label>Ürünün Rengini Giriniz:</label>
    <input type="text" name="urun_renk" value="<?php echo $urunlerCek['urun_renk']?>">
    <label>Ürünün Bedenlerini Seçiniz:</label>
    XS<input type="text" name="urun_beden_xs" value="<?php echo $urunlerCek['urun_beden_xs']?>">
    S<input type="text" name="urun_beden_s" value="<?php echo $urunlerCek['urun_beden_s']?>">
    M<input type="text" name="urun_beden_m" value="<?php echo $urunlerCek['urun_beden_m']?>">
    L<input type="text" name="urun_beden_l" value="<?php echo $urunlerCek['urun_beden_l']?>">
    XL<input type="text" name="urun_beden_xl" value="<?php echo $urunlerCek['urun_beden_xl']?>">
    <input type="hidden" name="urun_id" value="<?php echo $urunlerCek['urun_id']?>">
    <input type="submit" name="update">
</form>
<?php require_once "admin-footer.php";
    }
    else{
        header("location:../index.php");
    }
?>