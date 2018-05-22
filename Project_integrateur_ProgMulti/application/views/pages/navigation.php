<head>
    <meta charset="UTF-8">
 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/stylesNav.css');?>">
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script> 
	<script>
		$(document).ready(function(){ // Quand le document html est chargé
			var directionsService = new google.maps.DirectionsService(); // Instancie l'object de google map qui permet de calculer les directions (distance entre deux points par ex.)
			var markers = [];
			var myLatlng = new google.maps.LatLng(46.8283503, -71.2256562); // Donne la latitude et la longitude par défaut de google map.
			var mapOptions = {zoom: 8, center: myLatlng, mapTypeId: google.maps.MapTypeId.ROADMAP} // Donne les configuration de la map par défaut et le type de map
			var map = new google.maps.Map($("#map").get(0), mapOptions); // créer la map
		
			var listener = google.maps.event.addListener(map, "click", function(event) { // créer un observateur sur la map, lorsque l'utilisateur click, un évenement sera géré
				var marker = new google.maps.Marker({position: event.latLng, map: map}); // construit le marker
				markers.push(marker); // met le marker dans une liste
			
				if (markers.length > 1) { //si le nombre de marqueur est supérieur a 1, soit il y a deux marqueurs.
					google.maps.event.removeListener(listener); //on enlève les écouteurs de la map
					var marker1 = markers[0]; // on met les deux marqueurs dans une variable
					var marker2 = markers[1];
				
					var directionsRenderer = new google.maps.DirectionsRenderer(); //instancie le plugin de google map qui gère les directions à prendre sur deux points
					directionsRenderer.setMap(map); // dit à l'outil sur quelle map on travaille
					directionsRenderer.setPanel($("#directions").get(0)); // dit à l'outil ou mettre le paneau des directions
				
					var request = {origin: marker1.getPosition(), // position initiale
						destination: marker2.getPosition(), //la destination
						travelMode: google.maps.TravelMode.DRIVING}; //indique que l'on veut une direction utilisant le réseau routier
					directionsService.route(request, function(result, status) { //effectue les calculs
						if (status == google.maps.DirectionsStatus.OK) { //si la direction est bonne
							directionsRenderer.setDirections(result); } // on affiche
					});
				}  // fin  if
			});  // fin  listener
		});  // fin  ready
    </script>
</head>
   	<p style = " font-size:16px;">Cliquez sur deux points pour obtenir les <br />indications pour se rendre du premier au <br />second point.</p>
       <div id="map"></div>
       <div id="directions"></div>
