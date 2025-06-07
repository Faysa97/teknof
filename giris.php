<?php
session_start();
include("../baglan.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kullanici = $_POST['kullanici_adi'];
    $sifre = $_POST['sifre'];

    $sorgu = "SELECT * FROM admin WHERE kullanici_adi='$kullanici' AND sifre='$sifre'";
    $sonuc = $baglanti->query($sorgu);

    if ($sonuc->num_rows == 1) {
        $_SESSION['yonetici'] = $kullanici;
        header("Location: panel.php");
        exit;
    } else {
        $hata = "Kullanıcı adı veya şifre hatalı!";
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yönetici Girişi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    <style>
        body {
            background-color: #f2f2f2;
        }
        .login-container {
            max-width: 400px;
            margin: 80px auto;
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Yönetici Girişi</h2>
    <?php if (isset($hata)) echo "<div class='alert alert-danger'>$hata</div>"; ?>

    <form method="POST" onsubmit="return validateForm()">
        <div class="mb-3">
            <label for="kullanici_adi" class="form-label">Kullanıcı Adı</label>
            <input type="text" class="form-control" id="kullanici_adi" name="kullanici_adi">
        </div>
        <div class="mb-3">
            <label for="sifre" class="form-label">Şifre</label>
            <input type="password" class="form-control" id="sifre" name="sifre">
        </div>
        <button type="submit" class="btn btn-primary w-100">Giriş Yap</button>
        

    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- JavaScript Form Doğrulama -->
<script>
    function validateForm() {
        const kullanici = document.getElementById('kullanici_adi').value.trim();
        const sifre = document.getElementById('sifre').value.trim();
        
        if (kullanici === '' || sifre === '') {
            alert("Lütfen tüm alanları doldurun.");
            return false;
        }
        return true;
    }
</script>

</body>
</html>
