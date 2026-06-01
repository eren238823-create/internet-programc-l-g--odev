<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proje Hakkında - IDS Analizi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light">

    <?php include 'menu.php'; ?>

    <div class="container my-5">
        <div class="card border-0 shadow-sm p-4 p-md-5">
            <h2 class="text-primary border-bottom pb-2 mb-4">Veri Analizi ve Ön İşleme (EDA)</h2>
            <p class="lh-lg fs-6">
                Projede siber güvenlik dünyasında standart kabul edilen <strong>NSL-KDD</strong> veri seti kullanılmıştır. Veri setinde bulunan <em>neptune, satan, ipsweep</em> gibi onlarca farklı saldırı alt türü Python kullanılarak analiz edilmiş ve yapay zeka eğitimine hazır hale getirilmiştir.
            </p>
            
            <div class="row mt-5">
                <div class="col-md-6">
                    <h5 class="text-center fw-bold">Ağ Trafiği Dağılımı (İlk 5 Durum)</h5>
                    <div style="height: 300px;"><canvas id="grafik1"></canvas></div>
                </div>
                <div class="col-md-6">
                    <h5 class="text-center fw-bold">Temizlenmiş Hedef Değişken</h5>
                    <div style="height: 300px;"><canvas id="grafik2"></canvas></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const ctx1 = document.getElementById('grafik1').getContext('2d');
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Normal', 'Neptune (DoS)', 'Satan', 'Ipsweep', 'Portsweep'],
                datasets: [{ label: 'Kayıt Sayısı', data: [67343, 41214, 3633, 3599, 2931], backgroundColor: '#e74c3c' }]
            },
            options: { maintainAspectRatio: false }
        });

        const ctx2 = document.getElementById('grafik2').getContext('2d');
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Normal Trafik', 'Siber Saldırı'],
                datasets: [{ data: [67343, 58630], backgroundColor: ['#3498db', '#e74c3c'] }]
            },
            options: { maintainAspectRatio: false }
        });
    </script>
</body>
</html>