<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Mahasiswa Baru</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input[type="text"], textarea, select { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; border: 1px solid #ddd; border-radius: 4px; }
        textarea { resize: vertical; }
        .date-input { display: flex; gap: 10px; }
        .date-input select { width: calc(33.33% - 7px); }
        .radio-group { margin-top: 5px; }
        .radio-group input { margin-right: 5px; }
        .button-group { margin-top: 20px; text-align: center; }
        .button-group input { padding: 10px 15px; margin: 0 5px; cursor: pointer; border: none; border-radius: 4px; }
        .button-group input[type="submit"] { background-color: #4CAF50; color: white; }
        .button-group input[type="reset"] { background-color: #f44336; color: white; }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Pendaftaran Mahasiswa Baru Universitas X</h2>
    
    <form action="proses(1).php" method="GET"> 
        
        <label for="nama">Nama Lengkap:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="tempat_lahir">Tempat Lahir:</label>
        <input type="text" id="tempat_lahir" name="tempat_lahir" required>

        <label>Tanggal Lahir (Tgl-Bln-Thn):</label>
        <div class="date-input">
            <select name="tgl_lahir_tgl" required>
                <option value="">Tanggal (1-31)</option>
                <?php for ($i = 1; $i <= 31; $i++) { echo "<option value=\"$i\">$i</option>"; } ?>
            </select>
            
            <select name="tgl_lahir_bln" required>
                <option value="">Bulan (1-12)</option>
                <?php
                $bulan = ["01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember"];
                foreach ($bulan as $nomor => $nama_bln) {
                    echo "<option value=\"$nomor\">$nomor - $nama_bln</option>";
                }
                ?>
            </select>
            
            <select name="tgl_lahir_thn" required>
                <option value="">Tahun (1980-2005)</option>
                <?php for ($i = 2005; $i >= 1980; $i--) { echo "<option value=\"$i\">$i</option>"; } ?>
            </select>
        </div>

        <label for="alamat">Alamat Rumah (Text Area):</label>
        <textarea id="alamat" name="alamat" rows="4" required></textarea>

        <label>Jenis Kelamin (Radio Button):</label>
        <div class="radio-group">
            <input type="radio" id="pria" name="jenis_kelamin" value="Pria" required>
            <label for="pria" style="display: inline; font-weight: normal;">Pria</label>
            
            <input type="radio" id="wanita" name="jenis_kelamin" value="Wanita" style="margin-left: 20px;">
            <label for="wanita" style="display: inline; font-weight: normal;">Wanita</label>
        </div>
        
        <label for="asal_sekolah">Asal Sekolah (Text Box):</label>
        <input type="text" id="asal_sekolah" name="asal_sekolah" required>

        <label for="nilai_uan">Nilai UAN (Text Box):</label>
        <input type="text" id="nilai_uan" name="nilai_uan" required>

        <div class="button-group">
            <input type="submit" value="Submit Form">
            <input type="reset" value="Reset Form">
        </div>
    </form>
</div>

</body>
</html>