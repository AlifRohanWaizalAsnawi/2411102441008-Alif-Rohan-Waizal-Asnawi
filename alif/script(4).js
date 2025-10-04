// fungsi ubah teks & warna menggunakan  getElementById()
function ubahDenganId() {
    const paragrafid = document.getElementById("teks-id");
    paragrafid.textContent = "teks ini di ubah dengan getElementById()";
    paragrafid.style.color = "green";
    paragrafid.style.fontweight = "bold";
    console.log("berhasil ubah dengan getElementById()");
}

//fungsi ubah teks & warna menggunakan querySelector()
function ubahDenganQuery() {
    const paragrafClass = document.querySelector(".teks-class");
    paragrafClass.textContent = "teks ini di ubah dengan querySelector()"; 
    paragrafClass.style.color = "blue";
    paragrafClass.style.fontStyle = "italic";
    console.log("berhasil ubah dengan querySelector()");
}