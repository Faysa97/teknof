<?php
include("baglan.php");

// Kategorilere göre ürünleri çek
$sorgu = "SELECT * FROM urunler ORDER BY kategori ASC";
$sonuc = $baglanti->query($sorgu);

$urunler = [];

while ($row = $sonuc->fetch_assoc()) {
    $kategori = $row['kategori'];
    if (!isset($urunler[$kategori])) {
        $urunler[$kategori] = [];
    }
    $urunler[$kategori][] = $row;
}

$rss_url = "http://www.milliyet.com.tr/rss/rssNew/teknolojiRss.xml";

$haberler = [];

$rss = simplexml_load_file($rss_url);
if ($rss && isset($rss->channel->item)) {
    foreach ($rss->channel->item as $item) {
        $haberler[] = [
            'baslik' => (string) $item->title,
            'link' => (string) $item->link,
        ];
    }
} else {
    echo "RSS beslemesi bulunamadı veya formatı beklenenden farklı.";
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Teknof</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    body {
      background: #f8f9fa;
    }
    .product-card {
      border-radius: 12px;
      box-shadow: 0 4px 15px rgb(0 0 0 / 0.1);
      transition: transform 0.3s ease;
    }
    .product-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgb(0 0 0 / 0.15);
    }
    .product-img {
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
      height: 220px;
      object-fit: cover;
      width: 100%;
    }
    .news-panel {
      background-color: #212529;
      color: #fff;
      padding: 10px;
      overflow-x: auto;
      white-space: nowrap;
    }
    .news-panel span {
      margin-right: 25px;
    }
  </style>
</head>
<body>

<header class="bg-dark py-3 mb-4">
  <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
    <h1 class="text-white mb-3 mb-md-0">Teknof</h1>
    <div style="display: flex; gap: 10px;">
      <a href="hakkimizda.php" class="btn btn-outline-light">Hakkımızda</a>
      <a href="admin/giris.php" class="btn btn-outline-light">Yönetici</a>
      <a href="iletisim.php" class="btn btn-outline-light">İletişim</a>
      <!-- Buton -->
<a href="https://poe.com/tetebot" target="_blank" class="btn btn-primary">
  Tetebot'a Git
</a>
    </div>
  </div>
</header>



<!-- Ürünler -->
<div class="container mt-4">
  <?php foreach ($urunler as $kategoriAdi => $kategoriUrunleri): ?>
    <h2 class="my-4"><?= htmlspecialchars($kategoriAdi) ?></h2>
    <div class="row g-4">
      <?php foreach ($kategoriUrunleri as $urun): ?>
        <div class="col-md-4">
          <div class="product-card bg-white">
            <img src="resimler/<?= htmlspecialchars($urun['resim']) ?>" alt="<?= htmlspecialchars($urun['baslik']) ?>" class="product-img">
            <div class="p-3">
              <h5><?= htmlspecialchars($urun['baslik']) ?></h5>
              <p><?= htmlspecialchars(mb_strimwidth($urun['aciklama'], 0, 100, "...")) ?></p>
              <a href="urun_detay.php?id=<?= $urun['id'] ?>" class="btn btn-primary">Detayları Gör</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>
</div>




<br>
<br>
<br>

    <h1 class="text-black mb-3 mb-md-0">Haberler</h1>
 <ul class="list-group mb-5">
  <?php foreach (array_slice($haberler, 0, 3) as $haber): ?>
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <?= htmlspecialchars($haber['baslik']) ?>
      <a href="<?= htmlspecialchars($haber['link']) ?>" target="_blank" class="btn btn-sm btn-outline-secondary">Oku</a>
    </li>
  <?php endforeach; ?>
</ul>


<footer class="bg-dark text-white text-center py-3 mt-5">
  <div class="container">
    &copy; 2025 Teknolojik Ürünler | Tüm hakları saklıdır.
  </div>
</footer>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
