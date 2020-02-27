<?php
/**
 *
 * Draw.php
 *
 *
 * 
 * @copyright Copyright (c) 2015 David J Eddy
 * @link http://davidjeddy.com
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */

namespace davidjeddy\leaflet\plugins\draw;

use dosamigos\leaflet\Plugin;
use yii\web\JsExpression;
use yii\helpers\Json;


/**
 * Draw adds the ability to place line, shapes, and markers to your leaflet maps
 * 
 * @author David J Eddy <me@davidjeddy.com>
 * @link http://www.davidjeddy.com/
 * @link https://github.com/davidjeddy
 * @package davidjeddy\leaflet\plugins\draw
 */
class Draw extends Plugin
{
    /**
     * @var string the name of the javascript variable that will hold the reference
     * to the map object.
     */
    public $map = 'map';
    /**
     * @var array the options for the underlying LeafLetJs JS component.
     * Please refer to the LeafLetJs api reference for possible
     * [options](http://leafletjs.com/reference.html).
     */
    public $options = null;

    /* get/set methods */

    /**
     * Returns the plugin name
     * @return string
     */
    public function getPluginName()
    {

        return 'leaflet:draw';
    }

    /**
     * Returns the processed js options
     * @return array
     */
    public function getOptions()
    {
        return ($this->options
            ? json::encode($this->options)
            : '{}'
        );
    }

    /* non get/set methods */

    /**
     * Returns the javascript ready code for the object to render
     * @return \yii\web\JsExpression
     */
    public function encode()
    {
        $js = "
            var editableLayers = new L.FeatureGroup();
            {$this->map}.addLayer(editableLayers);

            var drawnItems = new L.FeatureGroup();
            {$this->map}.addLayer(drawnItems);

            var drawControl = new L.Control.Draw({$this->getOptions()});
            {$this->map}.addControl(drawControl);

            {$this->map}.on('draw:created', function (e) {
                var type = e.layerType,
                    layer = e.layer;

                /* if (type === 'marker') {
                    layer.bindPopup('A popup!');
                } */

                drawnItems.addLayer(layer);
            });
        ";

        return new JsExpression($js);
    }

    /**
     * Registers plugin asset bundle
     * @param \yii\web\View $view
     * @return mixed
     * @codeCoverageIgnore
     */
    public function registerAssetBundle($view)
    {
        DrawAsset::register($view);
        return $this;
    }
}
