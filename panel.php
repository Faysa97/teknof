<?php
session_start();
if (!isset($_SESSION['yonetici'])) {
    header("Location: giris.php");
    exit;
}
include("../baglan.php");
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yönetici Paneli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            background-color: #f8f9fa;
        }
        .panel-container {
            max-width: 1000px;
            margin: 40px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        .header-area {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
    </style>
</head>
<body>

<div class="container panel-container">
    <div class="header-area">
        <h2 class="mb-0">Yönetici Paneli</h2>
        <div>
            <span class="me-3">👤 Hoş geldin, <strong><?php echo htmlspecialchars($_SESSION['yonetici']); ?></strong></span>
            <a href="cikis.php" class="btn btn-danger btn-sm">Çıkış</a>
        </div>
    </div>

    <div class="mb-4">
        <a href="urun_ekle.php" class="btn btn-success">➕ Yeni Ürün Ekle</a>
    </div>

    <h4>📦 Ürün Listesi</h4>
    <div class="table-responsive mt-3">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Başlık</th>
                    <th scope="col">Resim</th>
                    <th scope="col">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sorgu = "SELECT * FROM urunler ORDER BY id DESC";
                $sonuc = $baglanti->query($sorgu);

                while ($row = $sonuc->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . htmlspecialchars($row['baslik']) . "</td>";
                    echo "<td><img src='../resimler/" . htmlspecialchars($row['resim']) . "' width='60' class='rounded'></td>";
                    echo "<td>
                            <a href='urun_duzenle.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Düzenle</a>
                            <a href='urun_sil.php?id=" . $row['id'] . "' onclick=\"return confirm('Silmek istediğinize emin misiniz?')\" class='btn btn-danger btn-sm ms-2'>Sil</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
