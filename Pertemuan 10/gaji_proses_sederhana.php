<?php
$jamKerja = (int)$_POST['jam_kerja'];
$upahNormalPerJam = 2000;
$upahLemburPerJam = 3000;
$batasJamNormal = 48;
$totalGaji = 0;

if ($jamKerja <= $batasJamNormal) {
    // Jika tidak ada lembur
    $gajiNormal = $jamKerja * $upahNormalPerJam;
    $jamLembur = 0;
    $gajiLembur = 0;
    $totalGaji = $gajiNormal;
} else {
    // Jika ada lembur
    $jamNormal = $batasJamNormal;
    $jamLembur = $jamKerja - $batasJamNormal;
    
    $gajiNormal = $jamNormal * $upahNormalPerJam;
    $gajiLembur = $jamLembur * $upahLemburPerJam;
    
    $totalGaji = $gajiNormal + $gajiLembur;
}

echo "<html><head><title>Hasil Hitung Gaji</title></head><body>";
echo "<h2>Hasil Perhitungan Gaji Karyawan</h2>";
echo "<p>Total Jam Kerja: **" . $jamKerja . " jam**</p>";
echo "<p>Jam Normal (Maks 48 jam): **" . min($jamKerja, $batasJamNormal) . " jam** (Rp " . number_format($upahNormalPerJam) . "/jam)</p>";
echo "<p>Jam Lembur: **" . $jamLembur . " jam** (Rp " . number_format($upahLemburPerJam) . "/jam)</p>";
echo "<hr>";
echo "<h3>Total Upah yang Diterima: **Rp " . number_format($totalGaji, 0, ',', '.') . ",-**</h3>";
echo "</body></html>";
?>