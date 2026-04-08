<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim & Öneri Formu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <?php include 'menu.php'; ?>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm p-4">
                    <h3 class="border-bottom pb-2 mb-4 text-center text-primary">Öneri & İletişim Formu</h3>

                    <?php
                    // YÖNERGE 4.3: Formdan gelen bilgiler PHP kullanılarak işlenmeli
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        
                        // Form verilerini güvenlik önlemiyle (htmlspecialchars) alıyoruz
                        $isim = htmlspecialchars($_POST["adSoyad"]);
                        $mesaj = htmlspecialchars($_POST["mesaj"]);

                        // YÖNERGE 4.4: Koşul Yapıları (if/else ile form doğrulama)
                        if (empty($isim) || empty($mesaj)) {
                            // Eğer alanlar boşsa hata mesajı
                            echo '<div class="alert alert-danger" role="alert">Lütfen adınızı ve mesajınızı eksiksiz giriniz!</div>';
                        } else {
                            // YÖNERGE 4.3: İşlenen bilginin ekranda gösterilmesi
                            echo '<div class="alert alert-success" role="alert">';
                            echo '<h4 class="alert-heading">İşlem Başarılı!</h4>';
                            echo '<p>Teşekkürler <strong>' . $isim . '</strong>, öneriniz sistemimize kaydedildi.</p>';
                            echo '<hr>';
                            echo '<p class="mb-0">Gönderdiğiniz Mesaj: <em>"' . $mesaj . '"</em></p>';
                            echo '</div>';
                        }
                    }
                    ?>

                    <form method="POST" action="iletisim.php">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Adınız Soyadınız</label>
                            <input type="text" class="form-control" name="adSoyad" placeholder="Örn: eren zeki">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Mesajınız / Öneriniz</label>
                            <textarea class="form-control" name="mesaj" rows="4" placeholder="Proje hakkındaki düşünceleriniz..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Gönder</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>