<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once ("../connect-database.php");
    if(isset($_POST['submit'])){
        $kaydet=$db->prepare("INSERT into urunler set
        urun_resim=:urun_resim,
        urun_isim=:urun_isim,
        urun_fiyat=:urun_fiyat,
        urun_stok=:urun_stok,
        urun_renk=:urun_renk,
        urun_tur=:urun_tur,
        urun_beden_xs=:urun_beden_xs,
        urun_beden_s=:urun_beden_s,
        urun_beden_m=:urun_beden_m,
        urun_beden_l=:urun_beden_l,
        urun_beden_xl=:urun_beden_xl
        ");
        if($_POST['urun_beden_xs']=="on"){
            $xs=1;
        }
        else{
            $xs=0;
        }
        if($_POST['urun_beden_s']=="on"){
            $s=1;
        }
        else{
            $s=0;
        }
        if($_POST['urun_beden_m']=="on"){
            $m=1;
        }
        else{
            $m=0;
        }
        if($_POST['urun_beden_l']=="on"){
            $l=1;
        }
        else{
            $l=0;
        }
        if($_POST['urun_beden_xl']=="on"){
            $xl=1;
        }
        else{
            $xl=0;
        }
        $insert=$kaydet->execute(array(
            'urun_resim'=>$_POST["urun_resim"],
            'urun_isim'=>$_POST["urun_isim"],
            'urun_fiyat'=>$_POST["urun_fiyat"],
            'urun_stok'=>$_POST["urun_stok"],
            'urun_renk'=>$_POST['urun_renk'],
            'urun_tur'=>$_POST['urun_tur'],
            'urun_beden_xs'=>$xs,
            'urun_beden_s'=>$s,
            'urun_beden_m'=>$m,
            'urun_beden_l'=>$l,
            'urun_beden_xl'=>$xl
        ));
        if($insert){
            Header("location:admin-product-add.php?urun=eklendi");
        }
        else{
            Header("location:admin-product-add.php?urun=eklenmedi");
        }
    }
    else{
        echo "başarısız";
    }




    //DÜZENLE




    if(isset($_POST['update'])){
        $urun_id=$_POST['urun_id'];
        $kaydet=$db->prepare("UPDATE urunler set
        urun_resim=:urun_resim,
        urun_isim=:urun_isim,
        urun_fiyat=:urun_fiyat,
        urun_stok=:urun_stok,
        urun_renk=:urun_renk
        where urun_id={$_POST['urun_id']}
        ");
        $insertUpdate=$kaydet->execute(array(
            'urun_resim'=>$_POST["urun_resim"],
            'urun_isim'=>$_POST["urun_isim"],
            'urun_fiyat'=>$_POST["urun_fiyat"],
            'urun_stok'=>$_POST["urun_stok"],
            'urun_renk'=>$_POST["urun_renk"]
        ));
        if($insertUpdate){
            echo "eklendi";
            Header("location:admin-product-table.php?urun=duzenlendi");
        }
        else{
            echo "eklenmedi";
            Header("location:admin-product-table.php?urun=duzenlenmedi");
        }
    }
    else{
        echo "başarısız";
    }
    if($_GET['urun_sil']=="ok"){
        $sil=$db->prepare("DELETE from urunler where urun_id=:id");
        $kontrol=$sil->execute(array(
            'id'=>$_GET['urun_id']
        ));
    if($kontrol){
        Header("location:admin-product-table.php?urun_sil=ok");
    }
    else{
        Header("location:admin-product-table.php?urun_sil=no");
    }
    }

?>