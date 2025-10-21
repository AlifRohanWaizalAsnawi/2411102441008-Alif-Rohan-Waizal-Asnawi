<?php
$saldoAwal = 1000000;
$bunga = 0.0025; // 0.25% dalam desimal
$bulan = 11;

// Menghitung total bunga yang diperoleh selama $bulan
// Bunga total = Saldo Awal * Bunga per bulan * Jumlah bulan
$totalBunga = $saldoAwal * $bunga * $bulan;

// Menghitung Saldo Akhir
// Saldo Akhir = Saldo Awal + Total Bunga
$saldoAkhir = $saldoAwal + $totalBunga;

echo "Saldo akhir setelah " . $bulan . " bulan adalah : Rp. " . $saldoAkhir . ",-";
?>