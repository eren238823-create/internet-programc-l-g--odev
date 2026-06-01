<?php
// YÖNERGE 4.5 & 5.1: Döngü Kullanımı ve En Az 5 Sayfa
$menu_elemanlari = [
    "Ana Sayfa" => "index.php",
    "Proje Hakkında" => "hakkinda.php",
    "IDS İçerikleri" => "icerikler.php", // Yeni Sayfa (Yönerge 5.2 - Diziler)
    "Kullanıcı Yorumları" => "yorumlar.php", // Yeni Sayfa (Yönerge 5.3 & 5.4 - Veri Saklama ve Listeleme)
    "İletişim" => "iletisim.php"
];
?>

<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #1e3c72;">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">IDS Yapay Zeka Projesi</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php
                foreach ($menu_elemanlari as $isim => $link) {
                    $aktif_mi = (basename($_SERVER['PHP_SELF']) == $link) ? "active fw-bold" : "";
                    echo "<li class='nav-item'><a class='nav-link $aktif_mi' href='$link'>$isim</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>