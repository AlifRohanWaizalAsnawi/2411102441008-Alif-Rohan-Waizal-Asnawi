// Ambil elemen tombol
const yellowBtn = document.getElementById('yellowBtn');
const redBtn = document.getElementById('redBtn');
const blueBtn = document.getElementById('blueBtn');
const greenBtn = document.getElementById('greenBtn');

// Fungsi untuk mengubah warna background
function changeColor(color) {
  document.body.style.backgroundColor = color;
}

// Event listener untuk setiap tombol
yellowBtn.addEventListener('click', () => changeColor('yellow'));
redBtn.addEventListener('click', () => changeColor('red'));
blueBtn.addEventListener('click', () => changeColor('blue'));
greenBtn.addEventListener('click', () => changeColor('green'));