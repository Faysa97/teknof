<?php
$host = "localhost";
$kullanici = "root";
$sifre = ""; // XAMPP'te şifresiz
$veritabani = "urun_tanitim";

$baglanti = new mysqli($host, $kullanici, $sifre, $veritabani);

if ($baglanti->connect_error) {
    die("Veritabanına bağlanılamadı: " . $baglanti->connect_error);
}
?>

