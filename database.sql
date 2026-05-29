CREATE DATABASE IF NOT EXISTS hotel
CHARACTER SET utf8
COLLATE utf8_general_ci;

USE hotel;

CREATE TABLE IF NOT EXISTS kullanicilar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ad VARCHAR(100) NOT NULL,
    soyad VARCHAR(100) NOT NULL,
    kadi VARCHAR(100) NOT NULL,
    ksifre VARCHAR(100) NOT NULL,
    yetki INT NOT NULL
);

INSERT INTO kullanicilar (ad, soyad, kadi, ksifre, yetki)
VALUES ('Admin', 'Kullanici', 'admin', '1234', 5);
