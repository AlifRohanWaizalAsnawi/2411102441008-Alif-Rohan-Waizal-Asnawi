const form = document.getElementById('datafrom')

form.addEventListener('submit',function(event) {event.preventDefault();

    const nama = document.getElementById('nama').value; 
    const nim = document.getElementById('nim').value;
    const semester = document.getElementById('semester').value;
    const prodi = document.getElementById('prodi').value;
    const email = document.getElementById('email').value;

    console.log("Nama:", nama);
    console.log("nim", nim);
    console.log("prodi",prodi);
    console.log("semester", semester);
    console.log("email", email);
    
    form.reset();
});