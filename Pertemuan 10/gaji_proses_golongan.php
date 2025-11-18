<?php
$jamKerja = (int)$_POST['jam_kerja'];
$golongan = $_POST['golongan'];
$upahLemburPerJam = 3000;
$batasJamNormal = 48;
$upahNormalPerJam = 0;
$totalGaji = 0;

// 1. Tentukan Upah Normal berdasarkan Golongan menggunakan SWITCH
switch ($golongan) {
    case 'A':
        $upahNormalPerJam = 4000;
        break;
    case 'B':
        $upahNormalPerJam = 5000;
        break;
    case 'C':
        $upahNormalPerJam = 6000;
        break;
    case 'D':
        $upahNormalPerJam = 7500;
        break;
    default:
        $upahNormalPerJam = 0; // Kasus tak terduga
}

// 2. Hitung Gaji Normal dan Lembur
if ($jamKerja <= $batasJamNormal) {
    $jamNormal = $jamKerja;
    $jamLembur = 0;
} else {
    $jamNormal = $batasJamNormal;
    $jamLembur = $jamKerja - $batasJamNormal;
}

$gajiNormal = $jamNormal * $upahNormalPerJam;
$gajiLembur = $jamLembur * $upahLemburPerJam;
$totalGaji = $gajiNormal + $gajiLembur;

// 3. Tampilkan Hasil
echo "<html><head><title>Hasil Hitung Gaji Golongan</title></head><body>";
echo "<h2>Hasil Perhitungan Gaji Karyawan</h2>";
echo "<p>Golongan Karyawan: **" . $golongan . "**</p>";
echo "<p>Total Jam Kerja: **" . $jamKerja . " jam**</p>";
echo "<p>Upah Normal per Jam: **Rp " . number_format($upahNormalPerJam) . ",-**</p>";
echo "<p>Jam Normal (Maks 48 jam): **" . $jamNormal . " jam**</p>";
echo "<p>Jam Lembur: **" . $jamLembur . " jam** (Rp " . number_format($upahLemburPerJam) . "/jam)</p>";
echo "<hr>";
echo "<h3>Total Upah yang Diterima: **Rp " . number_format($totalGaji, 0, ',', '.') . ",-**</h3>";
echo "</body></html>";
?>