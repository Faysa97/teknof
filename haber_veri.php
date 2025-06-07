<?php
$rss = simplexml_load_file("https://www.theverge.com/rss/index.xml");

$haberler = [];
for ($i = 0; $i < 5; $i++) {
    $item = $rss->channel->item[$i];
    $haberler[] = [
        'baslik' => (string) $item->title,
        'link' => (string) $item->link,
        'aciklama' => strip_tags((string) $item->description)
    ];
}
?>




<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Güncel Teknoloji Haberleri</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h1 class="mb-4">📢 Güncel Teknoloji Haberleri</h1>

  <?php include("haber_veri.php"); ?>
  
  <?php foreach ($haberler as $haber): ?>
    <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title"><?= htmlspecialchars($haber['baslik']) ?></h5>
        <p class="card-text"><?= htmlspecialchars(mb_strimwidth($haber['aciklama'], 0, 150, "...")) ?></p>
        <a href="<?= $haber['link'] ?>" target="_blank" class="btn btn-primary btn-sm">Haberi Oku</a>
      </div>
    </div>
  <?php endforeach; ?>
</div>

</body>
</html>
