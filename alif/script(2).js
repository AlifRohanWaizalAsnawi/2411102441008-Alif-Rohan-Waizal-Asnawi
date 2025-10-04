function runExercise() {
    console.clear(); //bersihkan console sebelum jalan

    // soal 1: const
    const Universitas = "Universitas Muhammadiyah Kalimantan Timur";
    console.log("nama Univesitas", Universitas);

    //soal 2: let
    let jumlahMahasiswa = 25;
    jumlahMahasiswa = jumlahMahasiswa + 5;
    console.log("jumlah Mahasiswa sekarang", jumlahMahasiswa);

    //soal 3: string
    let namaLengkap = "Ahmad Sahroni";
    console.log("Halo, nama saya" + namaLengkap);

    //SOAL 4: Number
    let angka1 = 10;
    let angka2 = 5;
    console.log("Hasil penjumlahan:", angka1 + angka2);
    console.log("hasil pengurangan:", angka1 - angka2);
    console.log("hasil pembagian:", angka1 / angka2);

    //SOAL 5: Boolean
    let nilaiUjian = 80;
    let lulus = nilaiUjian >= 70;
    console.log("apakah lulus?", lulus);
}