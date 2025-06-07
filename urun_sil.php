<?php
session_start();
if (!isset($_SESSION['yonetici'])) {
    header("Location: giris.php");
    exit;
}
include("../baglan.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Önce resmi sil (isteğe bağlı)
    $resimSorgu = $baglanti->query("SELECT resim FROM urunler WHERE id = $id");
    $resim = $resimSorgu->fetch_assoc()['resim'];
    unlink("../resimler/" . $resim);

    $sorgu = "DELETE FROM urunler WHERE id = $id";
    $baglanti->query($sorgu);
}

header("Location: panel.php");
exit;
?>
