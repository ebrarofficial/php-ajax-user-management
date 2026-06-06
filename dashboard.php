<?php
    session_start();

    if(!isset($_SESSION["oturum"])){
        header("Location: login.php");
        exit();
    }

    if(!$_SESSION["oturum"]){
        header("Location: login.php");
        exit();
    }

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="dashboard.php">User Panel</a>

    <div class="ml-auto">
        <span class="text-white mr-3"><?php echo $_SESSION["ad"]. " ". $_SESSION["soyad"]; ?></span>
        <a href="logout.php" class="btn btn-outline-light btn-sm">Çıkış Yap</a>
    </div>
</nav>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Kullanıcı Listesi</h4>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kullaniciModal" id="kullaniciEkleBtn">
            Kullanıcı Ekle
        </button>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Ad</th>
                        <th>Soyad</th>
                        <th>Kullanıcı Adı</th>
                        <th>Şifre</th>
                        <th>Yetki</th>
                        <th width="180">İşlem</th>
                    </tr>
                </thead>

                <tbody id="kullaniciListesi">
                <!--
                    <tr>
                        <td>1</td>
                        <td>Admin</td>
                        <td>Kullanici</td>
                        <td>admin</td>
                        <td>1234</td>
                        <td>5</td>
                        <td>
                            <button class="btn btn-warning btn-sm guncelleBtn" data-id="1" data-toggle="modal" data-target="#kullaniciModal">
                                Güncelle
                            </button>

                            <button class="btn btn-danger btn-sm silBtn" data-id="1">
                                Sil
                            </button>
                        </td>
                    </tr>
                -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="kullaniciModal" tabindex="-1" role="dialog" aria-labelledby="kullaniciModalBaslik" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="kullaniciModalBaslik">Kullanıcı Ekle</h5>

                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Kapat">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="kullaniciForm">
                    <input type="hidden" name="id" id="id">

                    <div class="form-group">
                        <label>Ad</label>
                        <input type="text" name="ad" id="ad" class="form-control" placeholder="Ad girin">
                    </div>

                    <div class="form-group">
                        <label>Soyad</label>
                        <input type="text" name="soyad" id="soyad" class="form-control" placeholder="Soyad girin">
                    </div>

                    <div class="form-group">
                        <label>Kullanıcı Adı</label>
                        <input type="text" name="kadi" id="kadi" class="form-control" placeholder="Kullanıcı adı girin">
                    </div>

                    <div class="form-group">
                        <label>Şifre</label>
                        <input type="password" name="ksifre" id="ksifre" class="form-control" placeholder="Şifre girin">
                    </div>

                    <div class="form-group">
                        <label>Yetki</label>
                        <select name="yetki" id="yetki" class="form-control">
                            <option value="1">User</option>
                            <option value="2">Editor</option>
                            <option value="3">Staff</option>
                            <option value="4">Manager</option>
                            <option value="5">Admin</option>
                        </select>
                    </div>

                    <button type="button" class="btn btn-primary btn-block" id="kaydetBtn">
                        Kullanıcı Ekle
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
        kullaniciListele();

        $("#kullaniciEkleBtn").on("click", function(){
            $("#kullaniciForm")[0].reset();
            $("#id").val("");
            $("#kullaniciModalBaslik").html("Kullanıcı Ekle");
            $("#kaydetBtn").html("Kullanıcı Ekle");
        });

        $("#kaydetBtn").on("click", function(){
            let formData = new FormData($("#kullaniciForm")[0]);
            if(!$("#id").val()){
                formData.append("gorev", "EKLE");
            }
            else{
                formData.append("gorev", "GUNCELLE");
            }
            $.ajax({
                url: "kontrol/kullanici_kontrol.php",
                data: formData,
                method: "POST",
                processData: false,
                contentType: false,
                success: function(cvp){
                    kullaniciListele();
                    $("#kullaniciModal").modal("hide");
                }
            });
        });

        $(document).on("click", ".silBtn", function(){
            let id = $(this).data("id");
            $.ajax({
                url: "kontrol/kullanici_kontrol.php",
                method: "POST",
                data: {
                    gorev: "SIL",
                    id: id
                },
                success: function(cvp){
                    kullaniciListele();
                }
            });
        });

        $(document).on("click", ".guncelleBtn", function(){
            let id = $(this).data("id");
            $.ajax({
                url: "kontrol/kullanici_kontrol.php",
                method: "GET",
                data: {
                    gorev: "GETIR",
                    id: id
                },
                dataType: "json",
                success: function(cvp){
                    $.each(cvp, function(anahtar, deger){
                        $.each($("#kullaniciForm")[0], function(inputIndex, inputEleman){
                            if(inputEleman.name == anahtar){
                                $(inputEleman).val(deger);
                            }
                        });
                    });

                    $("#kullaniciModalBaslik").html("Kullanıcı Güncelle");
                    $("#kaydetBtn").html("Güncelle");
                    $("#kullaniciModal").modal("show");
                }
            });
        });
    });
        
    function kullaniciListele(){
        $.ajax({
            url: "kontrol/kullanici_kontrol.php",
            method: "POST",
            data: {
                gorev: "LISTELE"
            },
            success: function(cvp){
                $("#kullaniciListesi").html(cvp);
            }
        });
    }

</script>

</body>
</html>