<?php
session_start();
if (!isset($_SESSION['yonetici'])) {
    header("Location: giris.php");
    exit;
}

include("../baglan.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $baslik = $_POST['baslik'];
    $aciklama = $_POST['aciklama'];
$kategori = $_POST['kategori'];

    $resim_ad = $_FILES['resim']['name'];
    $hedef_klasor = "../resimler/" . basename($resim_ad);
    move_uploaded_file($_FILES['resim']['tmp_name'], $hedef_klasor);

   $sorgu = "INSERT INTO urunler (baslik, aciklama, resim, kategori) VALUES ('$baslik', '$aciklama', '$resim_ad', '$kategori')";

    $baglanti->query($sorgu);

    echo "<p>Ürün eklendi!</p>";
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Ürün Ekle</title>
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
<body>
   <div class="container mt-5">
  <div class="card shadow-sm p-4 mx-auto" style="max-width: 600px;">
    <h2 class="mb-4 text-center">Ürün Ekle</h2>
    
    <form action="urun_ekle.php" method="POST" enctype="multipart/form-data">
      
      <div class="mb-3">
        <label for="baslik" class="form-label">Başlık:</label>
        <input type="text" name="baslik" id="baslik" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="aciklama" class="form-label">Açıklama:</label>
        <textarea name="aciklama" id="aciklama" class="form-control" rows="4" required></textarea>
      </div>

      <div class="mb-3">
        <label for="resim" class="form-label">Resim:</label>
        <input type="file" name="resim" id="resim" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="kategori" class="form-label">Kategori:</label>
        <select name="kategori" id="kategori" class="form-select" required>
          <option value="">Kategori Seçin</option>
          <option value="Dizüstü Bilgisayarlar">Dizüstü Bilgisayarlar</option>
          <option value="Akıllı Telefonlar">Akıllı Telefonlar</option>
          <option value="Aksesuar">Aksesuar</option>
          <option value="Giyilebilir Teknoloji">Giyilebilir Teknoloji</option>
          <option value="Kamera">Kamera</option>
         
        </select>
      </div>

      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary">Ekle</button>
      </div>
    </form>

    <div class="text-center mt-3">
      <a href="panel.php" class="text-decoration-none text-secondary">Panele Dön</a>
    </div>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



