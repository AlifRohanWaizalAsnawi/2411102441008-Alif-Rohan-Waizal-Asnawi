<!DOCTYPE html>
<html>
<head>
    <title>Menghitung Selisih Dua Waktu</title>
</head>
<body>
    <h1>Menghitung Selisih Dua Waktu</h1>

    <?php
    // --- Lakukan Konversi (Type Casting) dari String ke Integer ---

    // Waktu 1: Menggunakan intval() untuk memastikan nilai berupa integer
    $jam1 = intval($_POST['jam1']);     
    $menit1 = intval($_POST['menit1']); 
    $detik1 = intval($_POST['detik1']); 

    // Waktu 2: Menggunakan intval() untuk memastikan nilai berupa integer
    $jam2 = intval($_POST['jam2']);     
    $menit2 = intval($_POST['menit2']); 
    $detik2 = intval($_POST['detik2']); 

    // --- Perhitungan ---

    // Menghitung total detik untuk waktu pertama (sekarang aman)
    $totalDetik1 = $jam1 * 3600 + $menit1 * 60 + $detik1; 

    // Menghitung total detik untuk waktu kedua (sekarang aman)
    $totalDetik2 = $jam2 * 3600 + $menit2 * 60 + $detik2; 

    // Hitung selisih dan gunakan abs() agar hasilnya selalu positif
    $selisih = abs($totalDetik1 - $totalDetik2); 

    // --- Menampilkan Hasil ---
    echo "<p>Selisih dari kedua waktu adalah **$selisih** detik</p>";
    ?>

</body>
</html>