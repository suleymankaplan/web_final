<?php
try{
    $db=new PDO("mysql:host=localhost;dbname=web_tasarim_proje;charset=utf8",'root','');
}
catch(PDOException $e){
    echo $e->getMessage();
}
?>