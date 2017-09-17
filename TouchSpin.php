<?php

namespace armrck\touchspin;

use armrck\touchspin\TouchSpinAsset;

/**
 * A Yii2 input widget extension for manage touch spin with fields item and item_qtd.
 *
 * @author ARMANDO RICARDO NOGUEIRA on 16/09/2017
 * @package armrck\touchspin
 */
class TouchSpin extends \yii\base\Widget {

    public $model;
    public $collection = 'collection';
    public $attribute1 = 'item';
    public $attribute2 = 'qtw';
    public $items = [];

    /**
     * @var array Default options for the class HTML attributes
     */
    public $options = [
        'class' => 'armrck-touchspin',
    ];

    public function init() {
        $this->configHtmlOptions();
        $this->registerTouchSpinAsset();
        parent::init();
    }

    public function run() {
        parent::run();
        return $this->render('widget', [
                    'model' => $this->model,
                    'collection' => $this->collection,
                    'attribute1' => $this->attribute1,
                    'attribute2' => $this->attribute2,
                    'items' => $this->items
        ]);
    }

    /**
     * Config Html Options 
     */
    public function configHtmlOptions() {
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        if (!isset($this->options['class'])) {
            $this->options['class'] = 'armrck-touchspin';
        } else {
            $this->options['class'] = 'armrck-touchspin ' . $this->options['class'];
        }
    }

    /**
     * Register widget asset.
     */
    public function registerTouchSpinAsset() {
        $view = $this->getView();
        TouchSpinAsset::register($view);
    }

}
