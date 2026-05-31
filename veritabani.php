<?php
    require_once "config.php";
    try{
        $vt = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
        $vt -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $vt -> exec("SET NAMES UTF8");
    }catch(PDOException $e){
        echo "HATA: ". $e->getMessage();
    }
?>