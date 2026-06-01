<?php
// YÖNERGE 5.3 & 5.4: JSON Dosyasına Veri Saklama, Yorum Ekleme ve Listeleme
$dosya_yolu = 'yorumlar.json';

// Eğer form gönderildiyse
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isim = htmlspecialchars($_POST["isim"]);
    $yorum = htmlspecialchars($_POST["yorum"]);

    if (!empty($isim) && !empty($yorum)) {
        // Dosya varsa mevcut verileri oku, yoksa boş dizi oluştur
        if (file_exists($dosya_yolu)) {
            $mevcut_icerik = file_get_contents($dosya_yolu);
            $yorum_dizisi = json_decode($mevcut_icerik, true);
        } else {
            $yorum_dizisi = [];
        }

        // Yeni yorumu diziye ekle
        $yeni_yorum = [
            "isim" => $isim,
            "yorum" => $yorum,
            "tarih" => date("d.m.Y H:i")
        ];
        $yorum_dizisi[] = $yeni_yorum;

        // Güncel diziyi JSON olarak dosyaya yaz
        file_put_contents($dosya_yolu, json_encode($yorum_dizisi, JSON_PRETTY_PRINT));
        
        // Sayfayı yenileyerek POST işleminin tekrarlanmasını engelle
        header("Location: yorumlar.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Yorumları</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <?php include 'menu.php'; ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-5 mb-4">
                <div class="card border-0 shadow-sm p-4">
                    <h4 class="text-primary border-bottom pb-2">Yorum Ekle</h4>
                    <form method="POST" action="yorumlar.php">
                        <div class="mb-3">
                            <label class="form-label">Adınız</label>
                            <input type="text" class="form-control" name="isim" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Yorumunuz</label>
                            <textarea class="form-control" name="yorum" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Yorumu Kaydet</button>
                    </form>
                </div>
            </div>

            <div class="col-md-7">
                <div class="card border-0 shadow-sm p-4">
                    <h4 class="text-primary border-bottom pb-2">Ziyaretçi Yorumları</h4>
                    <div class="list-group mt-3">
                        <?php
                        if (file_exists($dosya_yolu)) {
                            $okunan_veriler = json_decode(file_get_contents($dosya_yolu), true);
                            
                            // Yorumları sondan başa (en yeni en üstte) sıralamak için
                            $okunan_veriler = array_reverse($okunan_veriler);

                            foreach ($okunan_veriler as $y) {
                                echo '
                                <div class="list-group-item list-group-item-action mb-2 border rounded">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1 fw-bold">' . htmlspecialchars($y["isim"]) . '</h6>
                                        <small class="text-muted">' . $y["tarih"] . '</small>
                                    </div>
                                    <p class="mb-1">' . htmlspecialchars($y["yorum"]) . '</p>
                                </div>';
                            }
                        } else {
                            echo '<div class="alert alert-info">Henüz yorum yapılmamış. İlk yorumu siz yapın!</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>