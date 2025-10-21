<?php
$jumlahUang = 1575250;

// Pecahan Uang yang Berlaku: 100000, 50000, 20000, 5000, 100, 50

// 1. Pecahan Rp. 100.000,- (Variabel $sa)
$sa = floor($jumlahUang / 100000); // Jumlah pecahan 100.000
$sisa = $jumlahUang % 100000;      // Sisa uang setelah diambil pecahan 100.000

// 2. Pecahan Rp. 50.000,- (Variabel $sb)
$sb = floor($sisa / 50000); // Jumlah pecahan 50.000 dari sisa
$sisa = $sisa % 50000;      // Sisa uang setelah diambil pecahan 50.000

// 3. Pecahan Rp. 20.000,- (Variabel $sc)
$sc = floor($sisa / 20000); // Jumlah pecahan 20.000 dari sisa
$sisa = $sisa % 20000;      // Sisa uang setelah diambil pecahan 20.000

// 4. Pecahan Rp. 5.000,- (Variabel $sd)
$sd = floor($sisa / 5000); // Jumlah pecahan 5.000 dari sisa
$sisa = $sisa % 5000;      // Sisa uang setelah diambil pecahan 5.000

// 5. Pecahan Rp. 100,- (Variabel $se)
$se = floor($sisa / 100); // Jumlah pecahan 100 dari sisa
$sisa = $sisa % 100;      // Sisa uang setelah diambil pecahan 100

// 6. Pecahan Rp. 50,- (Variabel $sf)
$sf = floor($sisa / 50); // Jumlah pecahan 50 dari sisa
// $sisa = $sisa % 50; // Sisa akhir, seharusnya 0 atau diabaikan

echo "Jumlah Rp. 100.000 :" . $sa . "<br />";
echo "Jumlah Rp. 50.000 :" . $sb . "<br />";
echo "Jumlah Rp. 20.000 :" . $sc . "<br />";
echo "Jumlah Rp. 5.000 :" . $sd . "<br />";
echo "Jumlah Rp. 100 :" . $se . "<br />";
echo "Jumlah Rp. 50 :" . $sf . "<br />";
?>