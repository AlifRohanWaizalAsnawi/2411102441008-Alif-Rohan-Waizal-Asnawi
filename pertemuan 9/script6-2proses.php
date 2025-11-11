<!DOCTYPE html>
<html>
<head>
    <title>Menghitung Komisi Salesman</title>
</head>
<body>
    <h1>Menghitung Komisi Salesman</h1>

    <?php
    // Membaca nilai penjualan dan persentase komisi
    $nilaiJual = $_POST['penjualan']; // membaca nilai penjualan
    $prosenKomisi = $_POST['komisi']; // membaca nilai prosentase komisi

    // Hitung komisi berdasarkan proses komisi: Penjualan * (Komisi / 100)
    $komisi = $nilaiJual * $prosenKomisi / 100; // hitung komisi berdasarkan prosen komisi

    // Menampilkan hasil
    echo "<p>Nilai penjualan salesman : Rp. **" . number_format($nilaiJual, 0, ',', '.') . "**</p>"; // menampilkan nilai penjualan salesman
    echo "<p>Prosentase Komisi : **$prosenKomisi** %</p>"; // menampilkan nilai prosentase komisi salesman
    echo "<p>Komisi yang didapat salesman adalah Rp. **" . number_format($komisi, 0, ',', '.') . "**</p>"; // menampilkan hasil perhitungan komisi
    ?>

</body>
</html>