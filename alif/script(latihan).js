// Simulasi data cuaca
const weatherData = {
  "Jakarta": {
    temperature: 30,
    condition: "Cerah"
  },
  "Bandung": {
    temperature: 25,
    condition: "Hujan Ringan"
  },
  "Surabaya": {
    temperature: 33,
    condition: "Panas Terik"
  },
  "Samarinda": {
    temperature: 28,
    condition: "Mendung"
  }
};

// Pastikan DOM sudah siap sebelum event listener dipasang
document.addEventListener("DOMContentLoaded", function () {
  const btn = document.getElementById("showBtn");
  btn.addEventListener("click", showWeather);
});

function showWeather() {
  const cityInput = document.getElementById("cityInput").value.trim();
  
  if (cityInput === "") {
    console.log("Silakan masukkan nama kota.");
    return;
  }

  const city = cityInput.charAt(0).toUpperCase() + cityInput.slice(1).toLowerCase();
  const data = weatherData[city];

  console.clear();
  if (data) {
    console.log(`Cuaca di ${city}:`);
    console.log(`Suhu: ${data.temperature}°C`);
    console.log(`Kondisi: ${data.condition}`);
  } else {
    console.log(`Data cuaca untuk kota "${city}" tidak ditemukan.`);
  }
}