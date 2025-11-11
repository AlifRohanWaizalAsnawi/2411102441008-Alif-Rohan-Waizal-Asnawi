<?php
    // Mengambil nilai dari form menggunakan $_POST
    $bilangan1 = $_POST['bil1'];
    $bilangan2 = $_POST['bil2'];

    // Menampilkan kembali nilai yang dimasukkan
    echo "<p>Anda telah memasukkan bilangan pertama = " . $bilangan1 . "</p>";
    echo "<p>Anda telah memasukkan bilangan kedua = " . $bilangan2 . "</p>";
?>