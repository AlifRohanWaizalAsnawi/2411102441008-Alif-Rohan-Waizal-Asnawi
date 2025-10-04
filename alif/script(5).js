//fungsi untuk ubah teks & style
function ubahKonten() {
    const judul = document.getElementById("judul");
    const paragraf = document.getElementById("paragraf");

// .textcontent ubah teks
judul.textContent = "judul Berubah!" ;
paragraf.textContent = "paragraf ini juga berubah setelah klik tombol";

// .style ubah tampilan dinamis
judul.style.color = "green";
judul.style.fontSize = "28xp";
paragraf.style.background = "#fef3c7";
paragraf.style.padding = "12xp";
paragraf.style.borderRadius ="8xp";

console.log("Konten berhasil diubah!");
}

// fungsi reset kembali ke awal
function resetKonten() {
    const judul = document.getElementById("judul");
    const paragraf = document.getElementById("paragraf");

    judul.textcontent = "judul Asli";
    paragraf.textContent = "ini adalah teks awal paragraf. ";

    judul.style.color = "#1f2937";
    judul.style.fontSize ="24xp";
    paragraf.style.background = "transparent";
    paragraf.style.padding = "0";
    paragraf.style.borderRadius = "0";

    console.log("konten sudah direset");
}