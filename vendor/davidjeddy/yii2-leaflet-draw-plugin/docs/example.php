<div>
    <?php
    // first lets setup the center of our map
    $center = new \dosamigos\leaflet\types\LatLng(['lat' => 51.508, 'lng' => -0.11]);

    // now lets create a marker that we are going to place on our map
    $marker = new \dosamigos\leaflet\layers\Marker(['latLng' => $center, 'popupContent' => 'Hi!']);

    // The Tile Layer (very important)
    $tileLayer = new \dosamigos\leaflet\layers\TileLayer([
       'urlTemplate' => 'http://otile{s}.mqcdn.com/tiles/1.0.0/map/{z}/{x}/{y}.jpeg',
        'clientOptions' => [
            'attribution' => 'Tiles Courtesy of <a href="http://www.mapquest.com/" target="_blank">MapQuest</a> <img src="http://developer.mapquest.com/content/osm/mq_logo.png">, Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
            'subdomains'  => '1234',
        ]
    ]);

    // now our component and we are going to configure it
    $leaflet = new \dosamigos\leaflet\LeafLet([
        'center' => $center, // set the center
    ]);

    $drawFeature = new \davidjeddy\leaflet\plugins\draw\Draw();
    $drawFeature->options = [
        "position" => "topright",
        "draw" => [
            "polyline" => [
                "shapeOptions" => [
                    "color" => "#ff0000",
                    "weight" => 10
                ]
            ],
            "polygon" => [
                "allowIntersection" => false, // Restricts shapes to simple polygons
                "drawError" => [
                    "color" => "#e1e100", // Color the shape will turn when intersects
                    "message" => "<b>Oh snap!</b> you can't draw that!" // Message that will show when intersect
                ],
                "shapeOptions" => [
                    "color" => "#bada55"
                ]
            ],
            "circle" => true, // Turns off this drawing tool
            "rectangle" => [
                "shapeOptions" => [
                    "clickable" => false
                ]
            ]
        ]
    ];

    // Different layers can be added to our map using the `addLayer` function.
    $leaflet->addLayer($marker)             // add the marker
            ->addLayer($tileLayer)          // add the tile layer
            ->installPlugin($drawFeature);  // add draw plugin

    // we could also do
    echo $leaflet->widget(['options' => ['style' => 'min-height: 300px']]);
    ?>
</div>