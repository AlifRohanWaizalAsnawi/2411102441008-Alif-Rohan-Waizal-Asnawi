<?php
    // 1. Mengambil nilai dari form menggunakan $_POST
    $bilangan1 = $_POST['bil1'];
    $bilangan2 = $_POST['bil2'];

    // 2. Melakukan operasi penjumlahan
    $jumlah = $bilangan1 + $bilangan2;
?>

<html>
<head>
    <title>Contoh Request POST</title>
</head>
<body>

    <h1>Input dua bilangan</h1>

    <?php
        // 3. Menampilkan inputan dan hasil penjumlahan
        echo "<p>Anda telah memasukkan bilangan pertama = " . $bilangan1 . "</p>";
        echo "<p>Anda telah memasukkan bilangan kedua = " . $bilangan2 . "</p>";
        echo "<p>Hasil penjumlahannya adalah " . $jumlah . "</p>";
    ?>

</body>
</html>