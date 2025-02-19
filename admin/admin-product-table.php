<?php
    session_start();
    if(isset($_SESSION['isim'])&&$_SESSION['isim']=="admin"){
    require_once "admin-header.php";
    require_once ("../connect-database.php");
?>
<table border="1">
    <tr>
        <th>Ürün ID</th>
        <th>Ürün İsmi</th>
        <th>Ürün Resmi</th>
        <th>Ürün Fiyatı</th>
        <th>Ürün Türü</th>
        <th>Ürün Stok</th>
        <th>Ürün Renk</th>
        <th>Ürün Bedenler</th>
        <th>Düzenle</th>
        <th>Sil</th>
    </tr>
    <?php
        $urunlerSor=$db->prepare("SELECT * from urunler");
        $urunlerSor->execute();
        while($urunlerCek=$urunlerSor->fetch(PDO::FETCH_ASSOC)){
            $sizes="";
            if($urunlerCek['urun_beden_xs']==1)
            $sizes.="xs ";
            if($urunlerCek['urun_beden_s']==1)
                $sizes.="s ";
            if($urunlerCek['urun_beden_m']==1)
                $sizes.="m ";
            if($urunlerCek['urun_beden_l']==1)
                $sizes.="l ";
            if($urunlerCek['urun_beden_xl']==1)
                $sizes.="xl ";
    
            ?>
        <tr>
            <td><?php echo $urunlerCek['urun_id']?></td>
            <td><?php echo $urunlerCek['urun_isim']?></td>
            <td><?php echo $urunlerCek['urun_resim']?></td>
            <td><?php echo $urunlerCek['urun_fiyat']?></td>
            <td><?php echo $urunlerCek['urun_tur']?></td>
            <td><?php echo $urunlerCek['urun_stok']?></td>
            <td><?php echo $urunlerCek['urun_renk']?></td>
            <td><?php echo $sizes?></td>
            <td><a href='admin-product-edit.php?urun_id=<?php echo $urunlerCek['urun_id']?>' class="button">Düzenle</a></td>
            <td><a href='admin-product-add-process.php?urun_id=<?php echo $urunlerCek['urun_id']?>&urun_sil=ok' class="button">Sil</a></td>
        </tr>
        <?php
        }
    ?>
<?php
    if($_GET['urun']=="duzenlendi")
        echo "ürün düzenlendi";
    if($_GET['urun_sil']){
        echo "ürün silindi";
    }
?>
</table>
<?php
    require_once "admin-footer.php";
    }
    else{
        header("location:../index.php");
    }
?>