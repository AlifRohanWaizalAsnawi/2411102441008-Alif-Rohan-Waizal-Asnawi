<!DOCTYPE html>
<html>
<head>
    <title>Baca Input dari Form</title>
</head>
<body>
    <h1>Hasil Baca Input dari Form</h1>
    <p>Berikut ini data yang telah Anda masukkan dari form:</p>

    <?php
    // Membaca input dari komponen form menggunakan $_POST
    $namaAnda = $_POST['nama'];     // baca input dari komponen nama
    $alamatAnda = $_POST['alamat'];   // baca input dari komponen alamat
    $sexAnda = $_POST['sex'];         // membaca input dari komponen sex
    $jobAnda = $_POST['job'];         // membaca input dari komponen job
    
    // Status menikah menggunakan checkbox, perlu pengecekan
    if (isset($_POST['status'])) {
        $statusMenikah = $_POST['status']; 
    } else {
        $statusMenikah = "Belum Menikah"; // Jika checkbox tidak dicentang
    }
    
    // Menampilkan data dalam bentuk tabel
    echo "<table>";
    echo "<tr><td>Nama Anda</td><td>:</td><td>$namaAnda</td></tr>";
    echo "<tr><td>Alamat Anda</td><td>:</td><td>$alamatAnda</td></tr>";
    echo "<tr><td>Jenis Kelamin Anda</td><td>:</td><td>$sexAnda</td></tr>";
    echo "<tr><td>Pekerjaan Anda</td><td>:</td><td>$jobAnda</td></tr>";
    echo "<tr><td>Status Menikah</td><td>:</td><td>$statusMenikah</td></tr>";
    echo "</table>";
    ?>

</body>
</html>