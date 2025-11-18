<?php
$tahun = $_POST['tahun'];

echo "<html><head><title>Hasil Cek Kabisat</title></head><body>";
echo "<h2>Hasil Pengecekan Tahun</h2>";
echo "<p>Tahun yang dimasukkan: **" . $tahun . "**</p>";

if (is_numeric($tahun)) {
    // Logika Tahun Kabisat
    if (($tahun % 4 == 0 && $tahun % 100 != 0) || ($tahun % 400 == 0)) {
        echo "<p>**Status:** Tahun **" . $tahun . "** adalah **Tahun Kabisat**.</p>";
    } else {
        echo "<p>**Status:** Tahun **" . $tahun . "** **Bukan** Tahun Kabisat.</p>";
    }
} else {
    echo "<p>Input tidak valid. Harap masukkan angka tahun.</p>";
}

echo "</body></html>";
?>