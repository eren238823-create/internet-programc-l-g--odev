<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IDS İçerikleri ve Saldırı Türleri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <?php include 'menu.php'; ?>

    <div class="container my-5">
        <h2 class="text-center text-primary mb-4">Siber Saldırı Türleri (Dinamik Liste)</h2>
        <div class="row">
            <?php
            // YÖNERGE 5.2: PHP dizileri ile içerik listesi oluşturulması
            $saldirilar = [
                ["ad" => "Neptune", "tur" => "DoS (Denial of Service)", "aciklama" => "Hedef sistemi kaynak yetersizliğine sürükleyerek hizmet veremez hale getirmeyi amaçlar."],
                ["ad" => "Satan", "tur" => "Probe (Keşif)", "aciklama" => "Ağdaki zafiyetleri taramak ve bilgi toplamak için kullanılan sinsi bir saldırı türüdür."],
                ["ad" => "Smurf", "tur" => "DoS", "aciklama" => "Kurbanın IP adresi taklit edilerek ağdaki tüm cihazlara ping atılmasıyla ağı boğma girişimidir."],
                ["ad" => "Guess_Passwd", "tur" => "R2L (Remote to Local)", "aciklama" => "Saldırganın uzaktan şifre tahmin etme yöntemleriyle sisteme yerel kullanıcı gibi sızmaya çalışmasıdır."]
            ];

            foreach ($saldirilar as $saldiri) {
                echo '
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title text-danger fw-bold">' . $saldiri["ad"] . '</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Kategori: ' . $saldiri["tur"] . '</h6>
                            <p class="card-text">' . $saldiri["aciklama"] . '</p>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>

</body>
</html>