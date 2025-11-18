<html>
<head>
    <title>Hitung Gaji Berdasarkan Golongan</title>
</head>
<body>
    <h1>Perhitungan Gaji Karyawan (Berdasarkan Golongan)</h1>
    <form method="post" action="gaji_proses_golongan.php">
        Masukkan Jumlah Jam Kerja (per minggu): <input type="text" name="jam_kerja" required><br><br>
        Pilih Golongan Karyawan:
        <select name="golongan">
            <option value="A">A - Rp 4.000,-/jam</option>
            <option value="B">B - Rp 5.000,-/jam</option>
            <option value="C">C - Rp 6.000,-/jam</option>
            <option value="D">D - Rp 7.500,-/jam</option>
        </select>
        <br><br>
        <input type="submit" value="Hitung Gaji">
    </form>
</body>
</html>