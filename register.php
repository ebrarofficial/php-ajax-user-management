<!-- register.php -->
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height:100vh;">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white text-center">
                    <h4>Kayıt Ol</h4>
                </div>

                <div class="card-body">
                    <form action="register.php" method="POST">
                        <div class="form-group">
                            <label>Ad</label>
                            <input type="text" name="ad" class="form-control" placeholder="Adınızı girin">
                        </div>

                        <div class="form-group">
                            <label>Soyad</label>
                            <input type="text" name="soyad" class="form-control" placeholder="Soyadınızı girin">
                        </div>

                        <div class="form-group">
                            <label>Kullanıcı Adı</label>
                            <input type="text" name="kadi" class="form-control" placeholder="Kullanıcı adınızı girin">
                        </div>

                        <div class="form-group">
                            <label>Şifre</label>
                            <input type="password" name="ksifre" class="form-control" placeholder="Şifrenizi girin">
                        </div>

                        <div class="form-group">
                            <label>Yetki</label>
                            <select name="yetki" class="form-control">
                                <option value="1">Kullanıcı</option>
                                <option value="2">Editör</option>
                                <option value="3">Moderatör</option>
                                <option value="4">Yönetici Yardımcısı</option>
                                <option value="5">Yönetici</option>
                            </select>
                        </div>

                        <button type="submit" name="kayit" class="btn btn-success btn-block">
                            Kayıt Ol
                        </button>

                        <a href="login.php" class="btn btn-outline-secondary btn-block">
                            Giriş Sayfasına Dön
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>