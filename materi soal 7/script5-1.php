<!DOCTYPE html>
<html>
<head>
    <title>Menghitung Komisi Salesman</title>
</head>
<body>
    <h1>Menghitung Komisi Salesman</h1>
    <?php
    /*
    Script ini akan menghitung komisi salesman berdasarkan nilai penjualan
    yang dicapainya yaitu sebesar Rp. 1.500.000,-
    Ketentuan komisinya adalah 5% dari nilai penjualan yang dicapai.
    */
    
    // Nilai penjualan yang didapat salesman
    $nilaiJual = 1500000; 

    // Menghitung komisi (5% dari nilai penjualan)
    $komisi = 0.05 * $nilaiJual; 

    // Menampilkan nilai penjualan salesman
    echo "<p>Nilai penjualan salesman : Rp. " . $nilaiJual . "</p>";

    // Menampilkan hasil perhitungan komisi
    echo "<p>Komisi yang didapat salesman adalah Rp. " . $komisi . "</p>";
    ?>
</body>
</html>