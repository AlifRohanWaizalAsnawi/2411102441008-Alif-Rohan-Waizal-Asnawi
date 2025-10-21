<html>
    <head>
        <title>Konversi Waktu Tempuh Ke Detik</title>
    </head>
    <body>
    <h1>Konversi Waktu Tempuh Ke Detik</h1>
    <?php
    /*
    Script ini akan mengkonversi waktu yang dinyatakan dalam 10:16:42 (10
    jam, 16 menit dan 42 detik) ke dalam satuan detik.
    */
    // Nilai Waktu Awal
    $jam = 10;
    $menit = 16;
    $detik = 42;
    // Konversi Satuan ke Detik
    $jamKeDetik = $jam * 3600; // konversi jam ke detik (1 jam = 3600 detik)
    $menitKeDetik = $menit * 60; // konversi menit ke detik (1 menit = 60 detik)
    $detikKeDetik = $detik; // konversi detik ke detik (tetap)
    // Hitung Total Detik
    $totalDetik = $jamKeDetik + $menitKeDetik + $detikKeDetik; // hitung total waktu dalam detik
    // Tampilkan Hasil
    echo "<p>Jika waktu " . $jam . ":" . $menit . ":" . $detik . " dinyatakan dalam 
    satuan detik adalah : " . $totalDetik . ".</p>";
    ?>
</body>
</html>