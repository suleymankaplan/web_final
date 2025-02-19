<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("connect-database.php");
    if(isset($_POST['submit'])){
        $kaydet=$db->prepare("INSERT into kullanicilar set
            kullanicilar_isim=:kullanicilar_isim,
            kullanicilar_soyisim=:kullanicilar_soyisim,
            kullanicilar_mail=:kullanicilar_mail,
            kullanicilar_sifre=:kullanicilar_sifre
        ");
        $insert=$kaydet->execute(array(
        'kullanicilar_isim'=>$_POST["kullanicilar_isim"],
        'kullanicilar_soyisim'=>$_POST["kullanicilar_soyisim"],
        'kullanicilar_mail'=>$_POST["kullanicilar_mail"],
        'kullanicilar_sifre'=>$_POST["kullanicilar_sifre"]
        ));
        if($insert){
            if($_POST['kullanicilar_sifre']==$_POST['kullanicilar_author']){
                Header('location:index.php');
                $_SESSION['isim']=$_POST['kullanicilar_isim'];
            }
            else{
                Header("location:sign-in.php?dogrulama=hata");
            }
        }
        else{
            echo "kayıt başarısız";
        }
        }

    if($_POST['sign-in']){
        $kullanici=$db->prepare("SELECT * from kullanicilar WHERE kullanicilar_mail =:kullanicilar_mail AND kullanicilar_sifre=:kullanicilar_sifre");
        $kullanici->execute(array(
            'kullanicilar_mail'=>$_POST['kullanicilar_mail'],
            'kullanicilar_sifre'=>$_POST['kullanicilar_sifre'],
        ));
        $kullaniciCek=$kullanici->fetch(PDO::FETCH_ASSOC);
            if($kullaniciCek){
                $_SESSION['isim']=$kullaniciCek['kullanicilar_isim'];
                Header("location:index.php");
            }
            else{
                Header("location:sign-in.php?id=hata");
            }
        if($_POST['kullanicilar_mail']=="admin"&&$_POST['kullanicilar_sifre']=="admin"){
            $_SESSION['isim']="admin";
            Header('location:admin/admin-product-add.php');
        }
    }

?>