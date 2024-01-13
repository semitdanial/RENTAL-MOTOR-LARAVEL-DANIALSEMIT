


    // Inisialisasi peta menggunakan Leaflet
    var mymap = L.map('map').setView([51.505, -0.09], 13);

    // Tambahkan layer peta dari OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(mymap);

    // Tambahkan marker ke peta
    L.marker([51.505, -0.09]).addTo(mymap)
        .bindPopup('Hello, this is a Bootstrap-friendly map!')
        .openPopup();

