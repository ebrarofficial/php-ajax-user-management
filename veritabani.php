<?php
    try{
        $vt = new PDO("mysql:host=127.0.0.1;dbname=hotel;", "root", "");
        $vt -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $vt -> exec("SET NAMES UTF8");
    }catch(PDOException $e){
        echo "HATA: ". $e->getMessage();
    }
?>