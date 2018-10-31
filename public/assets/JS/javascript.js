var lat = 48.852969;
var lon = 2.349903;
var map = null;
// Fonction d'initialisation de la carte
function initMap() {
    // Créer l'objet "map" et l'insèrer dans l'élément HTML qui a l'ID "map"
    map = new google.maps.Map(document.getElementById("map"), {
        // Nous plaçons le centre de la carte avec les coordonnées ci-dessus
        center: new google.maps.LatLng(lat, lon),
        // Nous définissons le zoom par défaut
        zoom: 11,
        // Nous définissons le type de carte (ici carte routière)
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        // Nous activons les options de contrôle de la carte (plan, satellite...)
        mapTypeControl: true,
        // Nous désactivons la roulette de souris
        scrollwheel: false,
        mapTypeControlOptions: {
            // Cette option sert à définir comment les options se placent
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
        },
        // Activation des options de navigation dans la carte (zoom...)
        navigationControl: true,
        navigationControlOptions: {
            // Comment ces options doivent-elles s'afficher
            style: google.maps.NavigationControlStyle.ZOOM_PAN
        }
    });
    // Nous appelons la fonction ajax de jQuery
    $.ajax({
        // On pointe vers le fichier selectData.php
        url : "selectData.php",
    }).done(function(json){ // Si on obtient une réponse, elle est stockée dans la variable json
        // On construit l'objet villes à partir de la variable json
        var villes = JSON.parse(json);
        // On parcourt l'objet villes
        for(ville in villes){
            var marker = new google.maps.Marker({
                // parseFloat nous permet de transformer la latitude et la longitude en nombre décimal
                position: {lat: parseFloat(villes[ville].lat), lng: parseFloat(villes[ville].lon)},
                title: villes[ville].nomVille,
                map: map
            });
        }
    });
}
window.onload = function(){
    // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
    initMap();
};