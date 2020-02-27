<!doctype html>
<html lang="en">
<head>
	<title>Leaflet Provider Demo</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<!-- Leaflet style. REQUIRED! -->
	<link rel="stylesheet" href="http://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
	<style>
		html { height: 100% }
		body { height: 100%; margin: 0; padding: 0;}
		.map { height: 100% }
	</style>
</head>
<body>
	<div id="map" class="map"></div>

	<script src="http://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
	<script src="/assets/leaflet-providers.js"></script>
	<script>
		var map = L.map('map', {
			center: [33.6079451,-89.4458369],
			zoom: 4,
			zoomControl: false
		});


		var picon = L.icon({
			iconUrl: 'img/057-stopwatch.png',

			iconSize:     [30, 30],
			shadowSize:   [50, 64],
			shadowAnchor: [4, 62], 
			popupAnchor:  [-3, -76]
		});

		var aicon = L.icon({
			iconUrl: 'img/005-calendar.png',

			iconSize:     [30, 30],
			shadowSize:   [50, 64],
			shadowAnchor: [4, 62], 
			popupAnchor:  [-3, -76]
		});
		

		var oicon = L.icon({
			iconUrl: 'img/028-express-delivery.png',

			iconSize:     [30, 30],
			shadowSize:   [50, 64],
			shadowAnchor: [4, 62], 
			popupAnchor:  [-3, -76]
		});
		

		var dicon = L.icon({
			iconUrl: 'img/015-delivered.png',
			iconSize:     [30, 30],
			shadowSize:   [50, 64],
			shadowAnchor: [4, 62]
		});

		var cicon = L.icon({
			iconUrl: 'img/016-delivery-failed.png',

			iconSize:     [30, 30],
			shadowSize:   [50, 64],
			shadowAnchor: [4, 62], 
			popupAnchor:  [-3, -76]
		});

        L.tileLayer.provider('Thunderforest.Landscape', {apikey: '9498d81d750d446c9904028d4d0b61c6'}).addTo(map);
		<?php foreach($list as $service): ?>
        var muxiCoordinates = [<?=$service['lat']?>,<?=$service['lng']?>];

        L.marker(muxiCoordinates, {icon: <?=$service['status'].'icon'?>}).addTo(map)
        .openPopup();
		<?php endforeach ?>
		var baseLayers = {
			'OpenStreetMap Default': defaultLayer,
		};

		var overlayLayers = {
			'OpenSeaMap': L.tileLayer.provider('OpenSeaMap'),
		};

        
		L.control.layers(baseLayers, overlayLayers, {collapsed: false}).addTo(map);

		// resize layers control to fit into view.
		function resizeLayerControl () {
			var layerControlHeight = document.body.clientHeight - (10 + 50);
			var layerControl = document.getElementsByClassName('leaflet-control-layers-expanded')[0];

			layerControl.style.overflowY = 'auto';
			layerControl.style.maxHeight = layerControlHeight + 'px';
		}
		map.on('resize', resizeLayerControl);
		resizeLayerControl();
	</script>
</body>
</html>