import pdb

class DiskonCalculator:
    """
    Kelas untuk menghitung diskon dan harga akhir.
    """
    def hitung_diskon(self, harga_awal: int, persentase_diskon: int) -> float:
        """
        Menghitung jumlah diskon yang diperoleh.
        """
        # pdb.set_trace() # <- Tempatkan di sini untuk debugging

        persentase_diskon_float = persentase_diskon / 100
        jumlah_diskon = harga_awal * persentase_diskon_float
        
        # <<< BUG BARU INTRODUCED HERE: Penambahan PPN 10% secara tidak sengaja >>>
        # PPN seharusnya hanya ditambahkan di harga akhir.
        jumlah_diskon_plus_ppn = jumlah_diskon * 1.10 # PPN 10%
        # return jumlah_diskon
        return jumlah_diskon_plus_ppn # Mengembalikan nilai yang salah
        # ---------------------------------------------------------------------

    def hitung_harga_akhir(self, harga_awal: int, persentase_diskon: int) -> float:
        """
        Menghitung harga akhir setelah dikurangi diskon, ditambah PPN 10%.
        """
        jumlah_diskon = self.hitung_diskon(harga_awal, persentase_diskon)
        
        # Harga setelah dikurangi diskon
        harga_setelah_diskon = harga_awal - jumlah_diskon
        
        # Tambahkan PPN 10% pada harga setelah diskon (Perhitungan yang benar)
        harga_akhir = harga_setelah_diskon * 1.10 # PPN 10%
        
        return harga_akhir