// ambil elemen
const tombol = document.getElementById("btn")
const teks = document.getElementById("teks")

// event klik tombol
tombol.addEventListener("click", function () {
    teks.textContent = "teks berhasi diubah dengan Javascript!";
    teks.style.color = "green";
});