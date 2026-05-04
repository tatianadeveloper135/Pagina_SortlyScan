const centros = [
    { nombre: "Recicla 503", lat: 13.70, lon: -89.20 },
    { nombre: "Centro Ayala", lat: 13.71, lon: -89.22 },
    { nombre: "RECITODO", lat: 13.69, lon: -89.18 },
    { nombre: "Planeta Limpio", lat: 13.68, lon: -89.21 }
];

// MAPA
let map = L.map('map').setView([13.69, -89.21], 12);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap'
}).addTo(map);

let markers = [];
let userMarker;

// FUNCIONES
function cargar(lista) {
    document.getElementById("cards").innerHTML = "";

    markers.forEach(m => map.removeLayer(m));
    markers = [];

    lista.forEach(c => {
        let marker = L.marker([c.lat, c.lon])
            .addTo(map)
            .bindPopup(`<b>${c.nombre}</b>`);

        markers.push(marker);

        let card = document.createElement("div");
        card.className = "card";

        card.innerHTML = `
            <strong>${c.nombre}</strong><br>
            <a class="btn"
               href="https://www.google.com/maps/dir/?api=1&destination=${c.lat},${c.lon}"
               target="_blank">
               Cómo llegar
            </a>
        `;

        card.onclick = () => {
            map.setView([c.lat, c.lon], 15);
            marker.openPopup();
        };

        document.getElementById("cards").appendChild(card);
    });
}

function buscar() {
    let texto = document.getElementById("busqueda").value.toLowerCase();
    let filtrados = centros.filter(c =>
        c.nombre.toLowerCase().includes(texto)
    );
    cargar(filtrados);
}

function miUbicacion() {
    navigator.geolocation.getCurrentPosition(pos => {
        let lat = pos.coords.latitude;
        let lon = pos.coords.longitude;

        map.setView([lat, lon], 14);

        if (userMarker) {
            map.removeLayer(userMarker);
        }

        userMarker = L.marker([lat, lon])
            .addTo(map)
            .bindPopup("Estás aquí 📍")
            .openPopup();
    }, () => {
        alert("No se pudo obtener tu ubicación");
    });
}

cargar(centros);