import unittest
from diskon_calculator import DiskonCalculator


class TestDiskonCalculator(unittest.TestCase):

    def setUp(self):
        self.calculator = DiskonCalculator()

    # Tes 1 menunjukkan perhitungan diskon normal
    def test_diskon_standar(self):
        diskon = self.calculator.hitung_diskon(100000, 10)
        self.assertEqual(diskon, 10000.0)

    # Tes 2 memastikan diskon 0% menghasilkan 0
    def test_diskon_nol(self):
        diskon = self.calculator.hitung_diskon(50000, 0)
        self.assertEqual(diskon, 0.0)

    # Tes 3 perhitungan harga akhir (float)
    def test_harga_akhir_standar(self):
        harga_akhir = self.calculator.hitung_harga_akhir(100000, 10)
        self.assertAlmostEqual(harga_akhir, 99000.0, places=2)

    # Tes 4 regresi bug lama (PPN ganda / nilai negatif)
    def test_regresi_negatif(self):
        harga_akhir = self.calculator.hitung_harga_akhir(100000, 10)
        self.assertNotEqual(harga_akhir, -90000.0)
        self.assertAlmostEqual(harga_akhir, 99000.0, places=2)


class TestDiskonLanjut(unittest.TestCase):

    def setUp(self):
        self.calculator = DiskonCalculator()

    # Tes 5 uji presisi float
    def test_float_diskon(self):
        harga_awal = 999
        persentase_diskon = 33

        # (999 - 329.67) * 1.10 = 736.263
        expected_harga_akhir = 736.263

        actual_harga_akhir = self.calculator.hitung_harga_akhir(
            harga_awal, persentase_diskon
        )

        self.assertAlmostEqual(actual_harga_akhir, expected_harga_akhir, places=3)

    # Tes 6 edge case harga awal 0
    def test_edge_case_harga_nol(self):
        harga_awal = 0
        persentase_diskon = 50

        diskon = self.calculator.hitung_diskon(harga_awal, persentase_diskon)
        harga_akhir = self.calculator.hitung_harga_akhir(harga_awal, persentase_diskon)

        self.assertEqual(diskon, 0.0)
        self.assertEqual(harga_akhir, 0.0)


if __name__ == "__main__":
    unittest.main()
