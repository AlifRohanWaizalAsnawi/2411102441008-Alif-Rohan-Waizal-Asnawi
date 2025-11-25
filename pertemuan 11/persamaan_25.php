<?php
// Batas atas loop adalah 23, karena jika x=24, y dan z harus 0 (bukan bilangan asli)
$batas_maks = 23; 
$total_solusi = 0;

echo "<h2>Solusi Persamaan X + Y + Z = 25 (X, Y, Z Bilangan Asli)</h2>";

// Loop untuk X
for ($x = 1; $x <= $batas_maks; $x++) {
    
    // Loop untuk Y
    for ($y = 1; $y <= $batas_maks; $y++) {
        
        // Nilai Z dihitung, bukan di-loop, untuk efisiensi
        $z = 25 - $x - $y;
        
        // Cek kondisi Z: harus bilangan asli (Z >= 1)
        if ($z >= 1) {
            // Cek kondisi batasan Z: Z tidak boleh melebihi batas_maks (23)
            // Sebenarnya, jika Z >= 1, maka Z pasti <= 23, tapi untuk keamanan kode:
            if ($z <= $batas_maks) {
                echo "X = " . $x . ", Y = " . $y . ", Z = " . $z . "<br>";
                $total_solusi++;
            }
        }
    }
}

echo "<hr>";
echo "<h3>Total banyaknya pasangan (solusi) adalah: " . $total_solusi . "</h3>";
?>