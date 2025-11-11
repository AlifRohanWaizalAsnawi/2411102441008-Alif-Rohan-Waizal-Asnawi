<!DOCTYPE html>
<html>
<head>
    <title>Hasil Saldo Tabungan</title>
</head>
<body>
    <h1>Hasil Perhitungan Saldo Akhir</h1>

    <?php
    // Ambil dan konversi input ke tipe data yang sesuai (float/integer)
    $saldo_awal = floatval($_POST['saldo_awal']);
    $bunga_persen = floatval($_POST['bunga_persen']);
    $lama_bulan = intval($_POST['lama_bulan']);

    // --- Perhitungan ---
    
    // 1. Hitung Bunga per Bulan (dari Saldo Awal)
    $bunga_per_bulan = $saldo_awal * ($bunga_persen / 100);

    // 2. Hitung Total Bunga selama menabung
    $total_bunga = $bunga_per_bulan * $lama_bulan;

    // 3. Hitung Saldo Akhir
    $saldo_akhir = $saldo_awal + $total_bunga;

    // --- Tampilkan Hasil ---
    echo "<table>";
    echo "<tr><td>Saldo Awal</td><td>:</td><td>Rp. " . number_format($saldo_awal, 0, ',', '.') . "</td></tr>";
    echo "<tr><td>Bunga Per Bulan</td><td>:</td><td>" . $bunga_persen . "%</td></tr>";
    echo "<tr><td>Lama Menabung</td><td>:</td><td>" . $lama_bulan . " bulan</td></tr>";
    echo "<tr><td>Bunga yang Didapat (Total)</td><td>:</td><td>Rp. " . number_format($total_bunga, 0, ',', '.') . "</td></tr>";
    echo "<tr><td><h2>Saldo Akhir Nasabah</h2></td><td>:</td><td><h2>Rp. " . number_format($saldo_akhir, 0, ',', '.') . "</h2></td></tr>";
    echo "</table>";
    ?>
    
</body>
</html>