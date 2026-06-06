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

            echo "OK";
        }
        else{
            echo "NO";
        }
    }
    else{
        echo "NO";
    }
?>