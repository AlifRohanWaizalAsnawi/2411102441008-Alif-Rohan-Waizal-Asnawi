import unittest
# Menggunakan diskon_calculator yang berisi BUG PPN GANDA untuk uji coba
from diskon_calculator import DiskonCalculator 

class TestDiskonLanjut(unittest.TestCase):
    """
    Kelas untuk menguji kasus lanjutan (float dan edge case).
    """
    def setUp(self):
        """
        Persiapan sebelum setiap metode uji dijalankan.
        """
        self.calculator = DiskonCalculator()

    # Tes 5: Uji nilai float (assertAlmostEqual)
    def test_float_diskon(self):
        """
        Menguji perhitungan diskon dengan hasil berupa float yang panjang (misal: 33% dari 999).
        Menggunakan assertAlmostEqual untuk menghindari kesalahan floating point.
        """
        harga_awal = 999
        persentase_diskon = 33
        
        # Perhitungan yang benar (Jika bug PPN sudah diperbaiki)
        # Diskon: 999 * (33/100) = 329.67
        # Harga Akhir: (999 - 329.67) * 1.10 = 736.263
        
        # KARENA BUG PPN GANDA MASIH ADA:
        # 1. hitung_diskon mengembalikan: (999 * 0.33) * 1.10 = 362.637
        # 2. hitung_harga_akhir mengembalikan: (999 - 362.637) * 1.10 = 700.0993
        expected_harga_akhir_with_bug = 700.0993 
        
        actual_harga_akhir = self.calculator.hitung_harga_akhir(harga_awal, persentase_diskon)
        
        # assertAlmostEqual digunakan untuk perbandingan float
        self.assertAlmostEqual(actual_harga_akhir, expected_harga_akhir_with_bug, places=4,
                               msg="Uji float gagal (Periksa apakah bug PPN ganda masih ada).")

    # Tes 6: Uji Edge Case (harga awal 0)
    def test_edge_case_harga_nol(self):
        """
        Menguji kasus batas di mana harga awal adalah 0. 
        Diskon dan Harga Akhir harus 0 (meskipun ada PPN, 0 * 1.10 = 0).
        """
        harga_awal = 0
        persentase_diskon = 50 
        
        # Hasil yang diharapkan adalah 0.0 (0 diskon, 0 harga akhir)
        expected_result = 0.0
        
        diskon = self.calculator.hitung_diskon(harga_awal, persentase_diskon)
        harga_akhir = self.calculator.hitung_harga_akhir(harga_awal, persentase_diskon)
        
        self.assertEqual(diskon, expected_result, 
                         msg="Uji Edge Case: Diskon seharusnya 0 jika harga awal 0.")
        self.assertEqual(harga_akhir, expected_result,
                         msg="Uji Edge Case: Harga Akhir seharusnya 0 jika harga awal 0.")

if __name__ == '__main__':
    unittest.main()