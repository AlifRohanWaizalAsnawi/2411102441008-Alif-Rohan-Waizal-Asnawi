<html>
<head>
    <title>Mencari Status Bilangan</title>
</head>
<body>
    <h1>Mencari Status Bilangan</h1>
<?php
// Menerima input dari formulir HTML (script7-2.php).
// Variabel yang diakses sudah diperbaiki dari 'bil1' menjadi 'bil'.
// Tambahan: menggunakan isset() untuk mencegah Warning jika form belum disubmit.

if (isset($_POST['bil'])) {
    $bilangan = $_POST['bil'];

    // --- cara ke - 1: Menggunakan Nested IF dan Output Langsung ---

    if ($bilangan > 0) {
        echo "<p>Cara 1: Bilangan **" . $bilangan . "** adalah positif</p>";
    } else {
        if ($bilangan < 0) {
            echo "<p>Cara 1: Bilangan **" . $bilangan . "** adalah negatif</p>";
        } else {
            echo "<p>Cara 1: Bilangan **" . $bilangan . "** adalah nol</p>";
        }
    }

    // --- cara ke - 2: Menetapkan Status ke Variabel, lalu Output Sekali ---

    if ($bilangan > 0) {
        $status = "positif";
    } else {
        if ($bilangan < 0) {
            $status = "negatif";
        } else {
            $status = "nol";
        }
    }

    echo "<p>Cara 2: Bilangan **" . $bilangan . "** adalah bilangan **" . $status . "**.</p>";
    
} else {
    echo "<p>Silakan masukkan bilangan dari form input (script7-2.php).</p>";
}
?>
</body>
</html>