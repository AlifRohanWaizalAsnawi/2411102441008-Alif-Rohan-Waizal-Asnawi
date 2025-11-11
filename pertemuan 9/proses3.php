<html>
<head>
    <title>Contoh Request POST</title>
</head>
<body>

    <h1>Input dua bilangan</h1>

    <?php
        // Langsung mengakses dan menampilkan nilai dari $_POST
        echo "<p>Anda telah memasukkan bilangan pertama = " . $_POST['bil1'] . "</p>";
        echo "<p>Anda telah memasukkan bilangan kedua = " . $_POST['bil2'] . "</p>";
    ?>

</html>