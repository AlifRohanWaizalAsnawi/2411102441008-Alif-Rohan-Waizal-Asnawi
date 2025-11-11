<!DOCTYPE html>
<html>
<head>
    <title>Pecahan Mata Uang</title>
</head>
<body>
    <h1>Hitung Pecahan Mata Uang</h1>
    
    <p>Hitung banyaknya masing-masing pecahan dari jumlah uang tertentu. Pecahan yang tersedia: Rp 100.000, Rp 50.000, Rp 20.000, Rp 5.000, Rp 100, dan Rp 50.</p>

    <form method="post" action="soal2_proses.php">
        <table>
            <tr>
                <td>Jumlah Uang yang Akan Diambil (Rp.)</td>
                <td>:</td>
                <td><input type="text" name="jumlah_uang" value="1575250"></td>
            </tr>
        </table>
        <br>
        <input type="submit" name="submit" value="Hitung Pecahan">
        <input type="reset" name="reset" value="Reset">
    </form>
</body>
</html>