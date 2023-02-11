var map = L.map('map').setView([52.26508071213027, 7.750914236359533], 16);
map.locate({setView: true, maxZoom: 16});

function onLocationFound(e) {
var radius = e.accuracy;

L.marker(e.latlng).addTo(map)
    .bindPopup("You are within " + radius + " meters from this point").openPopup();

L.circle(e.latlng, radius).addTo(map);
}

map.on('locationfound', onLocationFound);

var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);


$(window).on("resize", function() {
$("#map").height($(window).height() - 225);
map.invalidateSize();
}).trigger("resize");
