# 🐞 DEBUG LOG REPORT: PPN 10% Ganda

**Tanggal:** [Tanggal hari ini]
**Modul yang Diuji:** `diskon_calculator.py`
**Fungsi yang Diuji:** `hitung_harga_akhir()` dan `hitung_diskon()`
**Kasus Uji Debug:** harga_awal=100000, persentase_diskon=10
**Output yang Diharapkan (Benar):** (100000 - 10000) * 1.10 = 99000.0
**Output Actual (Salah):** (100000 - 11000) * 1.10 = 97900.0

---

## 1. Langkah-Langkah Debugging

1.  **Pengaturan `pdb`:** Tambahkan `pdb.set_trace()` di awal fungsi `hitung_diskon` dalam `diskon_calculator.py`.

2.  **Eksekusi:** Jalankan kode di luar mode unit test, misalnya:
    ```python
    calc = DiskonCalculator()
    calc.hitung_harga_akhir(100000, 10)
    ```

3.  **Investigasi `hitung_diskon` (Mencari PPN Pertama)**

| Perintah `pdb` | Variabel | Nilai | Tujuan/Analisis |
| :--- | :--- | :--- | :--- |
| `n` (hingga baris 17) | `jumlah_diskon` | `10000.0` | Nilai diskon yang benar tanpa PPN (10% dari 100000). |
| `p jumlah_diskon` | `jumlah_diskon` | **10000.0** | Pembuktian nilai sebelum PPN ditambahkan. |
| `n` (masuk baris BUG) | `jumlah_diskon_plus_ppn` | **11000.0** | **PENEMUAN BUG:** Variabel ini menunjukkan penambahan PPN 10% (`10000 * 1.10 = 11000.0`) secara tidak sengaja. |
| `p jumlah_diskon_plus_ppn` | `jumlah_diskon_plus_ppn` | **11000.0** | Pembuktian **PPN pertama (BUG)** telah diterapkan pada jumlah diskon. |
| `c` (lanjutkan) | | | Lanjutkan eksekusi ke `hitung_harga_akhir`. |

4.  **Investigasi `hitung_harga_akhir` (Mencari PPN Kedua)**

    Setelah `hitung_diskon` selesai, eksekusi kembali ke `hitung_harga_akhir`.

| Perintah `pdb` | Variabel | Nilai | Tujuan/Analisis |
| :--- | :--- | :--- | :--- |
| `p jumlah_diskon` | `jumlah_diskon` | **11000.0** | Nilai ini seharusnya 10000.0, namun sudah mengandung PPN 10% dari `hitung_diskon`. |
| `n` | `harga_setelah_diskon` | `89000.0` | Perhitungan: 100000 - 11000.0 = 89000.0. Harga dasar sudah salah. |
| `n` | `harga_akhir` | **97900.0** | Perhitungan: 89000.0 * 1.10 = 97900.0. **PPN kedua** diterapkan di sini (yang seharusnya dilakukan). |
| `p harga_akhir` | `harga_akhir` | **97900.0** | Pembuktian PPN kedua telah diterapkan pada harga akhir yang sudah mengandung kesalahan diskon (PPN pertama). |

## 2. Kesimpulan Debug

Bug ditemukan pada fungsi `hitung_diskon` di mana PPN 10% (`* 1.10`) ditambahkan ke `jumlah_diskon` sebelum dikembalikan, menyebabkan PPN dihitung dua kali secara keseluruhan.

**Perbaikan:** Hapus baris PPN dari `hitung_diskon` dan pastikan `hitung_diskon` hanya mengembalikan `jumlah_diskon` (10000.0 dalam kasus ini).