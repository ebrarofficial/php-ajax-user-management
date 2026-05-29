# PHP AJAX User Management

PHP, jQuery AJAX ve MySQL ile hazırlanmış basit kullanıcı yönetim sistemi.

## Özellikler

- Kullanıcı listeleme
- AJAX ile kullanıcı ekleme
- AJAX ile kullanıcı silme
- AJAX ile kullanıcı güncelleme
- PDO ile veritabanı bağlantısı
- Bootstrap modal form yapısı

## Kurulum

1. Projeyi XAMPP `htdocs` klasörüne alın.

2. `database.sql` dosyasını phpMyAdmin üzerinden içe aktarın.

3. `config.example.php` dosyasını kopyalayın ve adını `config.php` yapın.

4. `config.php` içindeki veritabanı bilgilerini kendi ortamınıza göre düzenleyin.

```php
$dbHost = "127.0.0.1";
$dbName = "hotel";
$dbUser = "root";
$dbPass = "";
