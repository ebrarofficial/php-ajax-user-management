<?php
    require_once("../veritabani.php");
    
    if(isset($_POST["kadi"])&&isset($_POST["ksifre"])){
        $SQL = "SELECT * FROM kullanicilar WHERE kadi=:kadi AND ksifre=:ksifre";
        $hzr = $vt -> prepare($SQL);
        $hzr -> execute($_POST);
        $kayit = $hzr -> fetch(PDO::FETCH_ASSOC);
        if($kayit){
            session_start();
            $_SESSION["oturum"] = true;
            $_SESSION["ad"] = $kayit["ad"];
            $_SESSION["soyad"] = $kayit["soyad"];
            $_SESSION["kadi"] = $kayit["kadi"];
            $_SESSION["yetki"] = $kayit["yetki"];

            echo "<h2>Giriş başarılı! Hoş geldiniz, ". $_SESSION["ad"]. " ". $_SESSION["soyad"]. "</h2>";
        }
        else{
            echo "<h2>Giriş başarısız!</h2>";
        }
    }
    else{
        echo "<h2>Böyle bir kullanıcı bulunamadı!</h2>";
    }
?>