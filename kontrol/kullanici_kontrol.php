<?php

    require_once "../veritabani.php";
    
    $grv="";

    if(isset($_POST["gorev"])){
        $grv=$_POST["gorev"];
        unset($_POST["gorev"]);
    }
    else if(isset($_GET["gorev"])){
        $grv=$_GET["gorev"];
        unset($_GET["gorev"]);
    }

    switch($grv){
        case "LISTELE":
            $SQL = "SELECT * FROM kullanicilar";
            $hzr = $vt -> prepare($SQL);
            $hzr -> execute();

            while($kayit=$hzr->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td>".
                    $kayit["id"]."</td><td>".
                    $kayit["ad"]."</td><td>".
                    $kayit["soyad"]."</td><td>".
                    $kayit["kadi"]."</td><td>".
                    $kayit["ksifre"]."</td><td>".
                    $kayit["yetki"]."</td><td>".
                    "<button type='button' class='btn btn-sm btn-info guncelleBtn' data-id='".$kayit["id"]."'>Düzenle</button> ".
                    "<button type='button' class='btn btn-sm btn-danger silBtn' data-id='".$kayit["id"]."'>Sil</button>".
                "</td></tr>";
            }
            
            break;

        case "EKLE":
            $SQL = "INSERT INTO kullanicilar (ad, soyad, kadi, ksifre, yetki) VALUES (:ad, :soyad, :kadi, :ksifre, :yetki)";
            unset($_POST["id"]);
            $hzr = $vt -> prepare($SQL);
            $hzr -> execute($_POST);
            break;

        case "GUNCELLE":
            $SQL = "UPDATE kullanicilar SET ad=:ad, soyad=:soyad, kadi=:kadi, ksifre=:ksifre, yetki=:yetki WHERE id=:id";
            $hzr = $vt -> prepare($SQL);
            $hzr -> execute($_POST);
            break;

        case "SIL":
            $SQL = "DELETE FROM kullanicilar WHERE id=:id";
            $hzr = $vt -> prepare($SQL);
            $hzr -> execute($_POST);
            break;
        
        case "GETIR":
            $SQL = "SELECT * FROM kullanicilar WHERE id=:id";
            $hzr = $vt -> prepare($SQL);
            $hzr -> execute($_GET);
            $kayit = $hzr -> fetch(PDO::FETCH_ASSOC);
            echo json_encode($kayit);
            break;

        default:
            echo "Geçersiz görev";
            break;
    }
?>