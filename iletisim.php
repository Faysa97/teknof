<?php
include("baglan.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ad = htmlspecialchars($_POST['ad']);
    $email = htmlspecialchars($_POST['email']);
    $konu = htmlspecialchars($_POST['konu']);
    $mesaj = htmlspecialchars($_POST['mesaj']);

    $stmt = $baglanti->prepare("INSERT INTO iletisim (ad, email, konu, mesaj) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $ad, $email, $konu, $mesaj);

    if ($stmt->execute()) {
        $basarili = true;
    } else {
        $hata = "Mesaj kaydedilirken hata oluştu.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>İletişim</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .iletisim-form {
            max-width: 700px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<header class="bg-dark text-white text-center py-4">
    <h1>İletişim</h1>
</header>

<div class="container">
    <div class="iletisim-form">
        <?php if (isset($basarili)): ?>
            <div class="alert alert-success text-center">✅ Mesajınız başarıyla kaydedildi!</div>
        <?php elseif (isset($hata)): ?>
            <div class="alert alert-danger text-center"><?= $hata ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Adınız Soyadınız</label>
                <input type="text" name="ad" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">E-Posta</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Konu</label>
                <input type="text" name="konu" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Mesaj</label>
                <textarea name="mesaj" rows="5" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Gönder</button>
            <a href="index.php" class="btn btn-secondary ms-2">← Anasayfa</a>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
