# PHP AJAX User Management

A simple user management system built with PHP, jQuery AJAX, and MySQL.

## Features

- List users
- Add users via AJAX
- Delete users via AJAX
- Update users via AJAX
- Database connection using PDO
- Bootstrap modal form structure

## Installation

1. Place the project in the XAMPP `htdocs` directory.

2. Import the `database.sql` file via phpMyAdmin.

3. Copy the `config.example.php` file and rename it to `config.php`.

4. Edit the database credentials in `config.php` according to your environment.

```php
$dbHost = "127.0.0.1";
$dbName = "hotel";
$dbUser = "root";
$dbPass = "";
