<!DOCTYPE html>
<html>
<head>
    <title>Hasil Pecahan Mata Uang</title>
</head>
<body>
    <h1>Banyaknya Pecahan Mata Uang</h1>

    <?php
    // Ambil dan konversi input ke integer (penting untuk perhitungan modulo)
    $jumlah_uang = intval($_POST['jumlah_uang']);
    $sisa_uang = $jumlah_uang; // Variabel untuk menyimpan sisa yang belum dipecah

    // Definisikan pecahan yang tersedia (dalam urutan menurun)
    $pecahan = [100000, 50000, 20000, 5000, 100, 50];
    
    echo "<table>";
    echo "<tr><td>Jumlah Uang Awal</td><td>:</td><td>Rp. " . number_format($jumlah_uang, 0, ',', '.') . "</td></tr>";
    echo "<tr><td colspan='3'><hr></td></tr>";
    
    // Looping untuk menghitung setiap pecahan
    foreach ($pecahan as $nilai) {
        // 1. Hitung berapa banyak pecahan $nilai yang bisa didapat dari $sisa_uang
        $banyak_pecahan = floor($sisa_uang / $nilai); 
        // NOTE: floor() memastikan hasil adalah bilangan bulat ke bawah
        
        // 2. Hitung sisa uang yang belum terpecah (menggunakan operator modulo %)
        $sisa_uang = $sisa_uang % $nilai; 
        
        // 3. Tampilkan hasil
        echo "<tr>";
        echo "<td>Pecahan Rp. " . number_format($nilai, 0, ',', '.') . "</td>";
        echo "<td>:</td>";
        echo "<td><b>" . $banyak_pecahan . "</b> lembar/keping</td>";
        echo "</tr>";
    }

    echo "<tr><td colspan='3'><hr></td></tr>";
    echo "<tr><td>Sisa Uang (yang tidak dapat dipecah)</td><td>:</td><td>Rp. " . $sisa_uang . "</td></tr>";
    echo "</table>";
    ?>
    
</body>
</html>