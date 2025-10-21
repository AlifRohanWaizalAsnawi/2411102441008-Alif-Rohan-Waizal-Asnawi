<!DOCTYPE html>
<html>
<head>
    <title>Menghitung selisih dua buah waktu</title>
</head>
<body>
    <h1>Menghitung selisih dua buah waktu</h1>
    <?php
    /*
    Script ini akan mencari selisih antara waktu 12:25:31 dengan 10:34:45.
    (Catatan: Berdasarkan nilai variabel, waktu pertama adalah 12:25:31 dan waktu kedua 10:34:45)
    Hasil selisih waktu dinyatakan dalam detik.
    */

    // Waktu Pertama (misalnya: 12:25:31)
    $jam1 = 12;
    $menit1 = 25;
    $detik1 = 31;

    // Waktu Kedua (misalnya: 10:34:45)
    $jam2 = 10;
    $menit2 = 34;
    $detik2 = 45;

    // 1. Konversi Waktu Pertama ke total detik
    $totalDetik1 = $jam1 * 3600 + $menit1 * 60 + $detik1; // menghitung total detik untuk waktu pertama

    // 2. Konversi Waktu Kedua ke total detik
    $totalDetik2 = $jam2 * 3600 + $menit2 * 60 + $detik2; // menghitung total detik untuk waktu kedua

    // 3. Hitung Selisih
    $selisih = $totalDetik1 - $totalDetik2; // hitung selisih total detik dari kedua waktu
    
    // Tampilkan Hasil
    echo "<p>Selisih dari kedua waktu adalah " . $selisih . " detik</p>";
    ?>
</body>
</html>