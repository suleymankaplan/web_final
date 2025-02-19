<?php
    session_start();
    if(isset($_SESSION['isim'])&&$_SESSION['isim']=="admin"){
    require_once "admin-header.php";
    require_once "../connect-database.php"
?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>İsim</th>
        <th>Soyisim</th>
        <th>Mail</th>
        <th>Şifre</th>
    </tr>
    <?php
        $kullaniciSor=$db->prepare("SELECT * from kullanicilar");
        $kullaniciSor->execute();

        while($kullaniciCek=$kullaniciSor->fetch(PDO::FETCH_ASSOC)){?>
        <tr>
            <td><?php echo $kullaniciCek['kullanicilar_id']?></td>
            <td><?php echo $kullaniciCek['kullanicilar_isim']?></td>
            <td><?php echo $kullaniciCek['kullanicilar_soyisim']?></td>
            <td><?php echo $kullaniciCek['kullanicilar_mail']?></td>
            <td><?php echo $kullaniciCek['kullanicilar_sifre']?></td>
        </tr>
        <?php
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