import unittest
from diskon_calculator import DiskonCalculator


class TestDiskonCalculator(unittest.TestCase):

    def setUp(self):
        self.calculator = DiskonCalculator()

    # Tes 1: Pengujian diskon standar
    def test_diskon_standar(self):
        diskon = self.calculator.hitung_diskon(100000, 10)
        self.assertEqual(diskon, 10000.0)

    # Tes 2: Pengujian diskon nol
    def test_diskon_nol(self):
        diskon = self.calculator.hitung_diskon(50000, 0)
        self.assertEqual(diskon, 0.0)

    # Tes 3: Pengujian harga akhir standar (FLOAT)
    def test_harga_akhir_standar(self):
        harga_akhir = self.calculator.hitung_harga_akhir(100000, 10)
        self.assertAlmostEqual(harga_akhir, 99000.0, places=2)

    # Tes 4: Pengujian regresi
    def test_regresi_negatif(self):
        harga_akhir = self.calculator.hitung_harga_akhir(100000, 10)
        self.assertNotEqual(harga_akhir, -90000.0)
        self.assertAlmostEqual(harga_akhir, 99000.0, places=2)


class TestDiskonLanjut(unittest.TestCase):

    def setUp(self):
        self.calculator = DiskonCalculator()

    # Tes 5: Uji float presisi tinggi
    def test_float_diskon(self):
        harga_awal = 999
        persentase_diskon = 33

        # (999 - 329.67) * 1.10 = 736.263
        expected_harga_akhir = 736.263

        actual_harga_akhir = self.calculator.hitung_harga_akhir(
            harga_awal, persentase_diskon
        )

        self.assertAlmostEqual(actual_harga_akhir, expected_harga_akhir, places=3)

    # Tes 6: Edge case harga awal 0
    def test_edge_case_harga_nol(self):
        harga_awal = 0
        persentase_diskon = 50
        expected_result = 0.0

        diskon = self.calculator.hitung_diskon(harga_awal, persentase_diskon)
        harga_akhir = self.calculator.hitung_harga_akhir(harga_awal, persentase_diskon)

        self.assertEqual(diskon, expected_result)
        self.assertEqual(harga_akhir, expected_result)


if __name__ == '__main__':
    unittest.main()
