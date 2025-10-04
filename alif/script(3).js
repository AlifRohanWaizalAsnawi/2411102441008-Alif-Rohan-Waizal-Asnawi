function cekKelulusan() {
    console.clear(); // bersihkan console biar rapi
    let nilai = document.getElementById("nilai").value;

    if (nilai === "") {
        console.log("⚠️ silahkan masukkan nilai terlebih dahulu. ");
        return;
    }

    nilai = parseInt(nilai);

    if (nilai >= 70) {
        console.log("nilai Anda:", nilai, "status Lulus");
    } else {
        console.log("nilai Anda:", nilai, "Status: tidak Lulus");
    }
}