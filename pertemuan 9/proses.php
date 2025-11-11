<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { width: 600px; margin: 0 auto; background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h2 { border-bottom: 2px solid #ccc; padding-bottom: 10px; }
        .output-data { line-height: 1.8; }
        .output-data span { display: inline-block; width: 150px; font-weight: bold; }
        .greeting { font-size: 1.2em; margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Data Pendaftaran Berhasil Diterima</h2>
    
    <?php
    // Cek apakah data sudah dikirimkan melalui metode POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Ambil dan bersihkan (sanitize) data dari form
        $nama_lengkap = isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : 'XXX';
        $tempat_lahir = isset($_POST['tempat_lahir']) ? htmlspecialchars($_POST['tempat_lahir']) : 'XXX';
        $tgl_lahir_tgl = isset($_POST['tgl_lahir_tgl']) ? htmlspecialchars($_POST['tgl_lahir_tgl']) : 'TGL';
        $tgl_lahir_bln = isset($_POST['tgl_lahir_bln']) ? htmlspecialchars($_POST['tgl_lahir_bln']) : 'BLN';
        $tgl_lahir_thn = isset($_POST['tgl_lahir_thn']) ? htmlspecialchars($_POST['tgl_lahir_thn']) : 'THN';
        $alamat_rumah = isset($_POST['alamat']) ? nl2br(htmlspecialchars($_POST['alamat'])) : 'XXX';
        $jenis_kelamin = isset($_POST['jenis_kelamin']) ? htmlspecialchars($_POST['jenis_kelamin']) : 'XXX';
        $asal_sekolah = isset($_POST['asal_sekolah']) ? htmlspecialchars($_POST['asal_sekolah']) : 'XXX';
        $nilai_uan = isset($_POST['nilai_uan']) ? htmlspecialchars($_POST['nilai_uan']) : 'XXX';

        // Format Tanggal Lahir (Contoh: 15-05-1995)
        $tanggal_lahir_formatted = $tgl_lahir_tgl . "-" . $tgl_lahir_bln . "-" . $tgl_lahir_thn;

        // Tampilkan output sesuai format yang diminta
        echo "<p class='greeting'>Terimakasih **$nama_lengkap** sudah mengisi form pendaftaran.</p>";
        
        echo "<div class='output-data'>";
        echo "<p><span>Nama Lengkap</span>: $nama_lengkap</p>";
        echo "<p><span>Tempat Lahir</span>: $tempat_lahir</p>";
        echo "<p><span>Tanggal Lahir</span>: $tanggal_lahir_formatted</p>";
        echo "<p><span>Alamat Rumah</span>: $alamat_rumah</p>";
        echo "<p><span>Jenis Kelamin</span>: $jenis_kelamin</p>";
        echo "<p><span>Asal Sekolah</span>: $asal_sekolah</p>";
        echo "<p><span>Nilai UAN</span>: $nilai_uan</p>";
        echo "</div>";

    } else {
        // Jika diakses langsung tanpa submit form
        echo "<p>Formulir belum disubmit. Silakan akses <a href='pendaftaran.php'>form pendaftaran</a>.</p>";
    }
    ?>

</div>

</body>
</html>