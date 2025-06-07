<?php
include("baglan.php");

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = intval($_GET['id']);

$sorgu = "SELECT * FROM urunler WHERE id=$id";
$sonuc = $baglanti->query($sorgu);

if ($sonuc->num_rows == 0) {
    echo "Ürün bulunamadı.";
    exit;
}

$urun = $sonuc->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo htmlspecialchars($urun['baslik']); ?> - Ürün Detay</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<header class="bg-dark py-3 mb-5">
  <div class="container">
    <h1 class="text-white text-center"><?php echo htmlspecialchars($urun['baslik']); ?></h1>
  </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="resimler/<?php echo $urun['resim']; ?>" alt="<?php echo htmlspecialchars($urun['baslik']); ?>" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <h3>Açıklama</h3>
            <p><?php echo nl2br(htmlspecialchars($urun['aciklama'])); ?></p>
            <a href="index.php" class="btn btn-secondary mt-3">Anasayfaya Dön</a>
        </div>
    </div>
</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
  <div class="container">&copy; 2025 Teknolojik Ürünler | Tüm hakları saklıdır.</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
