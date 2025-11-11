<!DOCTYPE html>
<html>
<head>
    <title>Hitung Saldo Tabungan</title>
</head>
<body>
    <h1>Perhitungan Saldo Tabungan</h1>
    
    <p>Seorang nasabah bank menabung di bank X. Bank X menerapkan kebijakan bunga 0,25% per bulan dari saldo awal tabungan.</p>

    <form method="post" action="soal1_proses.php">
        <table>
            <tr>
                <td>Saldo Awal (Rp.)</td>
                <td>:</td>
                <td><input type="text" name="saldo_awal" value="1000000"></td>
            </tr>
            <tr>
                <td>Besar Bunga Perbulan (%)</td>
                <td>:</td>
                <td><input type="text" name="bunga_persen" value="0.25"></td>
            </tr>
            <tr>
                <td>Lama Bulan Menabung</td>
                <td>:</td>
                <td><input type="text" name="lama_bulan" value="11"></td>
            </tr>
        </table>
        <br>
        <input type="submit" name="submit" value="Hitung Saldo">
        <input type="reset" name="reset" value="Reset">
    </form>
</body>
</html>