class DiskonCalculator:
    PPN = 0.10  # PPN 10%

    def hitung_diskon(self, harga_awal, persentase_diskon):
        """
        Menghitung nilai diskon.
        """
        if harga_awal <= 0 or persentase_diskon <= 0:
            return 0.0
        return harga_awal * (persentase_diskon / 100)

    def hitung_harga_akhir(self, harga_awal, persentase_diskon):
        """
        Menghitung harga akhir setelah diskon dan PPN.
        """
        if harga_awal <= 0:
            return 0.0

        diskon = self.hitung_diskon(harga_awal, persentase_diskon)
        harga_setelah_diskon = harga_awal - diskon

        # Hitung PPN (float aman)
        harga_akhir = harga_setelah_diskon * (1 + self.PPN)

        return harga_akhir
