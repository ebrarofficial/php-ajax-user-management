<!-- login.php -->
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height:100vh;">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Giriş Yap</h4>
                </div>

                <div class="card-body">
                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <label>Kullanıcı Adı</label>
                            <input type="text" name="kadi" class="form-control" placeholder="Kullanıcı adınızı girin">
                        </div>

                        <div class="form-group">
                            <label>Şifre</label>
                            <input type="password" name="ksifre" class="form-control" placeholder="Şifrenizi girin">
                        </div>

                        <button type="submit" name="giris" class="btn btn-primary btn-block">
                            Giriş Yap
                        </button>

                        <a href="register.php" class="btn btn-outline-secondary btn-block">
                            Kayıt Ol
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>