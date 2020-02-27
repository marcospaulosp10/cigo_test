<?php
/**
 * @copyright Copyright (c) 2015 David J Eddy
 * @link http://davidjeddy.com
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace davidjeddy\leaflet\plugins\draw;

use yii\web\AssetBundle;

/**    
 *
 * @author David J Eddy <me@davidjeddy.com>
 * @link http://www.davidjeddy.com/
 * @link https://github.com/davidjeddy
 * @package davidjeddy\leaflet\plugins\draw
 */
class DrawAsset extends AssetBundle
{
    public $css        = ['leaflet.draw.css'];
    public $depends    = ['\dosamigos\leaflet\LeafLetAsset'];
    public $js         = [];

    public $sourcePath = '@bower/leaflet.draw/dist';

    public function init()
    {
        $this->js = YII_DEBUG ? ['leaflet.draw-src.js'] : ['leaflet.draw.js'];
    }
}
