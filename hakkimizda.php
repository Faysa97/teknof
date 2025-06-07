<?php
include("baglan.php");
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Hakkımızda - Teknolojik Ürünler</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    body {
      background: #f8f9fa;
    }
    .about-section {
      background: #ffffff;
      border-radius: 12px;
      padding: 40px;
      box-shadow: 0 4px 15px rgb(0 0 0 / 0.1);
    }
  </style>
</head>
<body>

<header class="bg-dark py-3 mb-5">
  <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
    <h1 class="text-white mb-3 mb-md-0">Hakkımızda</h1>
    
  </div>
</header>

<div class="container">
  <div class="about-section">
    <h2>Biz Kimiz?</h2>
    <p>Teknolojik Ürünler, teknoloji meraklılarına en güncel ve yenilikçi ürünleri sunmak amacıyla kurulmuş bir platformdur.</p>

    <h2>Vizyonumuz</h2>
    <p>Teknoloji dünyasındaki gelişmeleri takip ederek kullanıcılarımıza güvenilir, kaliteli ve erişilebilir ürünler sunmak.</p>

    <h2>Misyonumuz</h2>
    <p>En yeni teknolojik ürünleri en uygun fiyatlarla sunmak, müşteri memnuniyetini ön planda tutmak ve sektörde öncü bir marka olmak.</p>

    <h2>İletişim</h2>
    <p>Bizimle iletişime geçmek için <a href="iletisim.php">iletişim</a> sayfamızı ziyaret edebilirsiniz.</p>

    <!-- Anasayfa Butonu -->
    <div class="mt-4">
      <a href="index.php" class="btn btn-primary">Anasayfaya Dön</a>
    </div>
  </div>
</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
  <div class="container">
    &copy; 2025 Teknolojik Ürünler | Tüm hakları saklıdır.
  </div>
</footer>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
