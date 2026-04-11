# buah.py

# List untuk simpan data
d = []

def p(n, h, s):
    # n = nama, h = harga, s = stok
    # Pelanggaran: Penamaan variabel satu huruf sangat membingungkan
    b = {"nama": n, "harga": h, "stok": s}
    d.append(b)
    print("Data " + n + " sudah masuk ke dalam list sistem")

def cek():
    # Pelanggaran: Fungsi melakukan perhitungan dan printing sekaligus (SRP Violation)
    for i in d:
        t = i["harga"] * i["stok"]
        print("Buah: " + i["nama"] + " | Total Aset: " + str(t))

# Pemanggilan fungsi
p("Apel", 5000, 10)
p("Mangga", 8000, 5)
cek()