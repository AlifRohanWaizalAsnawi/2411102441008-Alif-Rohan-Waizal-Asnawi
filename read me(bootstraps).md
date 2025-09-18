1. Foto Profil

<img src="Karbit.jpg" alt="Foto Profil" class="w-28 h-28 rounded-full object-cover mx-auto">

Menampilkan foto profil berbentuk lingkaran (rounded-full).

object-cover menjaga gambar tidak gepeng.

2. Info Profil

<h4 class="text-lg font-semibold">Alif_king_carbeat</h4>
<button>Edit profil</button>
<button>Lihat arsip</button>
<i class="bi bi-gear-fill"></i>


Nama pengguna ditampilkan besar & tebal.

Ada tombol Edit profil dan Lihat arsip.

Ikon gear ⚙ menggunakan Bootstrap Icons (bi bi-gear-fill).

3. Statistik Akun

<p><span class="font-bold">12</span> kiriman</p>
<p><span class="font-bold">11</span> pengikut</p>
<p><span class="font-bold">2001</span> diikuti</p>

Menampilkan jumlah kiriman, pengikut, dan mengikuti.

4. Bio

<p class="text-sm">yang ngeklaim Mati</p>

Bio singkat pemilik akun.

5. Highlight Story

<div class="w-16 h-16 rounded-full border-2 flex items-center justify-center">
  <span class="text-3xl text-gray-500">+</span>
</div>
<p class="text-center text-sm mt-2">Baru</p>

Lingkaran kosong dengan tanda + untuk menambah highlight baru.

6. Grid Postingan

<div class="grid grid-cols-3 gap-2">
  <div class="aspect-video">
    <img src="obsidian.jpg" class="w-full h-full object-cover rounded">
  </div>
  <!-- dst... -->
</div>

Menggunakan grid 3 kolom untuk menampilkan postingan foto.

Setiap gambar diatur supaya penuh kotak dan tidak gepeng dengan object-cover.

7. Tailwind CSS

Digunakan untuk styling cepat, contohnya:
flex, grid, items-center, justify-center → mengatur tata letak
rounded-full, rounded → membuat foto/gambar jadi bulat atau punya sudut melengkung
hover:bg-gray-200 → efek hover di tombol.

8. Bootstrap Icons

Dipakai hanya untuk ikon gear (bi bi-gear-fill).
Agar muncul, tambahkan link CDN berikut di <head>:

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">