<?php

/**
 * @copyright Copyright &copy; 2017, Armando Ricardo Nogueira, w3bsistemas.com
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package armrck\touchspin
 * @version 1.0.0.0
 */

namespace armrck\touchspin;

/**
 * Asset bundle for Armrck Touch Spin widget. Includes assets from bootstrap plugin.
 *
 * @see http://github.com/armandoricky/armrck-touch-spin
 * @author Armando Ricardo Nogueira <armandoricky@gmail.com>
 * @since 1.0.0.0
 */
class TouchSpinAsset extends \yii\web\AssetBundle {

    public $sourcePath = '@vendor/armrck/yii2-touch-spin/assets';
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset'
    ];

    public function init() {
        $this->css = [YII_DEBUG ? 'css/armrck-touch-spin.css' : 'css/armrck-touch-spin.min.css'];
        $this->js = [YII_DEBUG ? 'js/armrck-touch-spin.js' : 'js/armrck-touch-spin.min.js'];
    }

}
