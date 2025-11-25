<?php
// Cek apakah data form sudah dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $saldo_awal = (int)$_POST['saldo_awal'];
    $N = (int)$_POST['bulan'];

    // --- PEMBATASAN MAKSIMAL 12 BULAN ---
    $max_months = 12;
    // Tentukan jumlah bulan yang akan dihitung (maksimal 12)
    $months_to_calculate = min($N, $max_months);
    // ------------------------------------

    // Konstanta
    $biaya_admin = 9000;
    $batas_bunga = 1100000;
    $bunga_kecil = 0.03; // 3% p.a.
    $bunga_besar = 0.04; // 4% p.a.

    // Saldo awal untuk perhitungan
    $saldo_akhir = $saldo_awal;

    echo "<h2>Hasil Perhitungan Saldo Tabungan</h2>";
    echo "<p>Saldo Awal: Rp " . number_format($saldo_awal, 0, ',', '.') . "</p>";
    
    // Pesan peringatan jika input melebihi 12 bulan
    if ($N > $max_months) {
        echo "<p>Jangka Waktu Input (N): " . $N . " Bulan</p>";
        echo "<p style='color: red;'>*Perhatian: Perhitungan dibatasi maksimal " . $max_months . " bulan.</p>";
    } else {
        echo "<p>Jangka Waktu (N): " . $N . " Bulan</p>";
    }

    echo "<hr>";

    // Perulangan untuk N bulan, dibatasi maksimal 12
    for ($i = 1; $i <= $months_to_calculate; $i++) {
        
        // 1. Tentukan tingkat bunga
        // Bunga dihitung berdasarkan saldo terakhir
        $tingkat_bunga_tahunan = ($saldo_akhir < $batas_bunga) ? $bunga_kecil : $bunga_besar;
        
        // Bunga bulanan = bunga_tahunan / 12
        $bunga_bulanan = $tingkat_bunga_tahunan / 12;
        
        // 2. Hitung Bunga (dihitung dari saldo terakhir)
        $nominal_bunga = $saldo_akhir * $bunga_bulanan;
        
        // 3. Kurangi Biaya Administrasi
        $saldo_setelah_admin = $saldo_akhir - $biaya_admin;

        // 4. Hitung Saldo Akhir Bulan (Saldo setelah admin + Bunga)
        $saldo_akhir = $saldo_setelah_admin + $nominal_bunga;

        // Tampilkan detail per bulan
        // Saldo Awal Bulan (rekonstruksi untuk tampilan)
        $saldo_awal_bulan_ini = $saldo_akhir - $nominal_bunga + $biaya_admin;


        echo "<h4>Bulan ke-" . $i . "</h4>";
        echo "Saldo Awal Bulan: Rp " . number_format($saldo_awal_bulan_ini, 0, ',', '.') . "<br>";
        echo "Tingkat Bunga (p.a.): " . ($tingkat_bunga_tahunan * 100) . "%<br>";
        echo "Bunga Diterima: Rp " . number_format($nominal_bunga, 2, ',', '.') . "<br>";
        echo "Biaya Administrasi: Rp " . number_format($biaya_admin, 0, ',', '.') . "<br>";
        echo "<strong>Saldo Akhir Bulan: Rp " . number_format(max(0, $saldo_akhir), 0, ',', '.') . "</strong><br>";
    }

    echo "<hr>";
    echo "<h3>Saldo Akhir Setelah " . $months_to_calculate . " Bulan adalah: Rp " . number_format(max(0, $saldo_akhir), 0, ',', '.') . "</h3>";

} else {
    echo "Akses tidak langsung. Silakan isi form di <a href='tabungan_form.html'>sini</a>.";
}
// Penutup blok if ($N > $max_months) dan tag PHP
?>