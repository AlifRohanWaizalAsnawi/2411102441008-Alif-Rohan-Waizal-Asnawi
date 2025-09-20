1. Setup Dasar
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Instagram</title>

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<!DOCTYPE html> → mendefinisikan dokumen HTML5.
lang="id" → bahasa dokumen diatur ke Bahasa Indonesia.
meta viewport → agar layout responsif di perangkat mobile.
Tailwind CDN → menambahkan Tailwind CSS untuk styling instan.

2. Container Utama
<body class="bg-gray-100">
  <div class="container mx-auto p-5">

bg-gray-100 → memberi background abu-abu muda.
container mx-auto p-5 → konten berada di tengah (mx-auto) dengan padding 5.

3. Bagian Foto Profil + Info
<div class="flex items-center">

flex items-center → membuat layout horizontal sejajar antara foto profil dan info akun.

📌 Foto Profil
<div class="w-1/4 text-center">
  <img src="Karbit.jpg" alt="Foto Profil" 
       class="w-28 h-28 rounded-full object-cover mx-auto">
</div>

w-1/4 → lebar 25% dari parent.
rounded-full → membuat foto jadi bulat.
object-cover → gambar proporsional.

📌 Info Profil
<div class="w-3/4">
  <div class="flex items-center mb-3">
    <h4 class="text-lg font-semibold mr-3">Alif_king_carbeat</h4>
    <button class="border px-3 py-1 text-sm rounded mr-2 hover:bg-gray-200">Edit profil</button>
    <button class="border px-3 py-1 text-sm rounded hover:bg-gray-200">Lihat arsip</button>
    <i class="bi bi-gear-fill ml-3 text-xl"></i>
  </div>


Nama profil tebal & besar.
Tombol Edit profil dan Lihat arsip dengan hover effect.

<i class="bi bi-gear-fill"> → ikon gear (Bootstrap Icons).

 Statistik
<div class="flex mb-2 text-sm">
  <p class="mr-4"><span class="font-bold">12</span> kiriman</p>
  <p class="mr-4"><span class="font-bold">11</span> pengikut</p>
  <p><span class="font-bold">2001</span> diikuti</p>
</div>

Menampilkan jumlah kiriman, pengikut, dan mengikuti.

<p class="text-sm">yang ngeklaim Mati</p>

Bio singkat pengguna.

4. Highlight Story
<div class="mt-6 flex justify-center">
  <div class="w-16 h-16 rounded-full border-2 flex items-center justify-center">
    <span class="text-3xl text-gray-500">+</span>
  </div>
</div>
<p class="text-center text-sm mt-2">Baru</p>

Lingkaran dengan tanda + → untuk menambah highlight baru.
Label “Baru” ditaruh di bawahnya.

5. Grid Postingan
<div class="mt-8">
  <h5 class="mb-3 font-semibold">Postingan</h5>
  <div class="grid grid-cols-3 gap-2">

grid grid-cols-3 gap-2 → layout grid 3 kolom, ada jarak antar gambar.

Setiap Postingan
<div class="aspect-video">
  <img src="obsidian.jpg" class="w-full h-full object-cover rounded">
</div>

aspect-video → menjaga rasio aspek.
w-full h-full object-cover → gambar menutupi kotak penuh.
rounded → sedikit melengkung di sudut.

Ada total 12 postingan: obsidian.jpg, gehenna.jpg, lillth.jpg, dunk.jpg, spinosaurus.jpg, grimlock.avif, batmanwh.avif, batmanred.jpg, batmandrk.jpg, natsumi.jpg, kurumi.jpg, nia.jpg.

Teknologi yang Dipakai
HTML5 → struktur dokumen.
Tailwind CSS → styling utility-based.
Bootstrap Icons → ikon gear (⚙).

Cara Menjalankan
Simpan file ini sebagai index.html.
Letakkan semua gambar (Karbit.jpg, obsidian.jpg, dst) di folder yang sama.
Tambahkan CDN Bootstrap Icons di <head> agar ikon muncul:

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

Buka file di browser.