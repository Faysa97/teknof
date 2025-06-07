<?php
session_start();
if (!isset($_SESSION['yonetici'])) {
    header("Location: giris.php");
    exit;
}
include("../baglan.php");

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Geçersiz ürün ID!";
    exit;
}

$id = (int) $_GET['id'];

// Ürün bilgilerini çek
$sorgu = "SELECT * FROM urunler WHERE id = $id";
$sonuc = $baglanti->query($sorgu);

if ($sonuc->num_rows == 0) {
    echo "Ürün bulunamadı!";
    exit;
}

$urun = $sonuc->fetch_assoc();

// Güncelleme işlemi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $baslik = $_POST['baslik'];
    $aciklama = $_POST['aciklama'];

    if (!empty($_FILES['resim']['name'])) {
        $yeni_resim = basename($_FILES['resim']['name']);
        move_uploaded_file($_FILES['resim']['tmp_name'], "../resimler/" . $yeni_resim);
    } else {
        $yeni_resim = $urun['resim'];
    }

    $guncelle = "UPDATE urunler SET baslik=?, aciklama=?, resim=? WHERE id=?";
    $stmt = $baglanti->prepare($guncelle);
    $stmt->bind_param("sssi", $baslik, $aciklama, $yeni_resim, $id);
    $stmt->execute();

    echo '<div class="alert alert-success text-center mt-3">✅ Ürün başarıyla güncellendi!</div>';
    
    // Güncellenmiş veriyi tekrar al
    $sonuc = $baglanti->query($sorgu);
    $urun = $sonuc->fetch_assoc();
}

$id = $_GET['id'];
$sorgu = $baglanti->prepare("SELECT * FROM urunler WHERE id = ?");
$sorgu->bind_param("i", $id);
$sorgu->execute();
$sonuc = $sorgu->get_result();
$urun = $sonuc->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $baslik = $_POST['baslik'];
  $aciklama = $_POST['aciklama'];
  $kategori = $_POST['kategori'];

  $guncelle = $baglanti->prepare("UPDATE urunler SET baslik = ?, aciklama = ?, kategori = ? WHERE id = ?");
  $guncelle->bind_param("sssi", $baslik, $aciklama, $kategori, $id);
  $guncelle->execute();

  echo "<div class='alert alert-success'>Ürün başarıyla güncellendi.</div>";
  // Gerekirse yönlendirme ekleyebilirsin
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Ürünü Düzenle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .form-container {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        img.preview {
            max-width: 150px;
            border-radius: 6px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body class="bg-light">

<div class="container form-container">
    <h2 class="mb-4">🛠️ Ürünü Düzenle</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Başlık</label>
            <input type="text" name="baslik" class="form-control" value="<?php echo htmlspecialchars($urun['baslik']); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Açıklama</label>
            <textarea name="aciklama" rows="5" class="form-control" required><?php echo htmlspecialchars($urun['aciklama']); ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Mevcut Resim</label><br>
            <img src="../resimler/<?php echo htmlspecialchars($urun['resim']); ?>" class="preview" alt="Mevcut Resim">
        </div>

        <div class="mb-3">
            <label class="form-label">Yeni Resim (İsteğe Bağlı)</label>
            <input type="file" name="resim" class="form-control">
        </div>
 <div class="mb-3">
      <label class="form-label">Kategori</label>
      <select name="kategori" class="form-select" required>
        <option value="">Kategori Seçiniz</option>
        <option value="Dizüstü Bilgisayarlar" <?= $urun['kategori'] == 'Dizüstü Bilgisayarlar' ? 'selected' : '' ?>>Dizüstü Bilgisayarlar</option>
        <option value="Akıllı Telefonlar" <?= $urun['kategori'] == 'Akıllı Telefonlar' ? 'selected' : '' ?>>Akıllı Telefonlar</option>
        <option value="Kamera" <?= $urun['kategori'] == 'Kamera' ? 'selected' : '' ?>>Kamera</option>
        <option value="Giyilebilir Teknoloji" <?= $urun['kategori'] == 'Giyilebilir Teknoloji' ? 'selected' : '' ?>>Giyilebilir Teknoloji</option>
        <option value="Aksesuar" <?= $urun['kategori'] == 'Aksesuar' ? 'selected' : '' ?>>Aksesuar</option>
      </select>
    </div>
        <button type="submit" class="btn btn-primary">💾 Güncelle</button>
        <a href="panel.php" class="btn btn-secondary ms-2">← Panele Dön</a>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
