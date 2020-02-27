Leaflet Draw Plugin
===================

Yii 2 [LeafletJs](http://leafletjs.com/) Plugin for the 2amigo Leaflet extension that adds the [Leaflet Draw](https://github.com/Leaflet/Leaflet.draw) functionality.

This Plugin works in conjunction with [LeafLet](https://github.com/2amigos/yii2-leaflet-extension) library for [Yii 2](https://github.com/yiisoft/yii2) framework. 

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require "davidjeddy/yii2-leaflet-draw-plugin" "*"
```
or add

```json
"davidjeddy/yii2-leaflet-draw-plugin" : "*"
```

to the require section of your application's `composer.json` file.

Usage
-----

```php
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

	// init the 2amigos leaflet plugin provided by the package
    $drawFeature = new \davidjeddy\leaflet\plugins\draw\Draw();
	// optional config array for leadlet.draw
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
```

Testing
-------

```bash
TODO
```

Todo
----

ADD `edit` menu ability 
ADD custom marker functionality

Contributing
------------

Please see [./docs/CONTRIBUTING](./docs/CONTRIBUTING.md) for details.

Credits
-------

- [David J Eddy](https://github.com/davidjeddy/)
- [Antonio Ramirez](https://github.com/tonydspaniard)
- [All Contributors](./docs/CONTRIBUTING.md)

License
-------

The BSD License (BSD). Please see [./docs/License File](./docs/LICENSE.md) for more information.

Special Thanks
--------------
> [![2amigOS!](http://www.gravatar.com/avatar/55363394d72945ff7ed312556ec041e0.png)](http://http://2amigos.us/)  
<i>Web development has never been so fun!</i>  
[http://2amigos.us/](http://http://2amigos.us/)

> (http://http://sourcetoad.com/)  
<i>Sourcetoad is an award winning app development firm based in Tampa, FL. We are specialists in cross-platform web and mobile application development.</i>  
[http://sourcetoad.com/](http://sourcetoad.com/)
