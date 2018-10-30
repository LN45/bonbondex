// On initialise la latitude et la longitude de Paris (centre de la carte)
var lat = 47.8935944;
var lon = 1.8944918;
var map = null;

// Fonction d'initialisation de la carte
function initMap() {
    // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
    macarte = L.map('map').setView([lat, lon], 11);
    // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        // Il est toujours bien de laisser le lien vers la source des données
        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
        minZoom: 1,
        maxZoom: 20
    }).addTo(macarte);
    // Nous appelons la fonction ajax de jQuery
    $.ajax({
        // On pointe vers le fichier selectData.php
        url : "/src/Model/AdressesManager.php",
    }).done(function(json){ // Si on obtient une réponse, elle est stockée dans la variable json
        // On construit l'objet villes à partir de la variable json
        var adresses = JSON.parse(json);
        // On parcourt l'objet villes
        for(adresse in adresses){
            var marker = new google.maps.Marker({
                // parseFloat nous permet de transformer la latitude et la longitude en nombre décimal
                position: {lat: parseFloat(adresses[adresse].lat), lng: parseFloat(adresses[adresse].lon)},
                title: adresses[adresse].nom,
                map: map
            });
        }
    });
}

window.onload = function(){
    // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
    initMap();
};