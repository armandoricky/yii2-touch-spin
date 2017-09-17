<?php

namespace armrck\touchspin;

use armrck\touchspin\TouchSpinAsset;

/**
 * A Yii2 input widget extension for manage touch spin with fields item and item_qtd.
 *
 * @author ARMANDO RICARDO NOGUEIRA on 16/09/2017
 * @package armrck\touchspin
 */
class TouchSpin extends \yii\widgets\InputWidget {

    public $items = [];
    public $attribute;
    public $name_field_1 = 'item';
    public $name_field_2 = 'item_qtd';

    /**
     * @var array Default options for the class HTML attributes
     */
    public $options = [
        'class' => 'armrck-touchspin',
    ];

    public function init() {
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        if (!isset($this->options['class'])) {
            $this->options['class'] = 'armrck-touchspin';
        } else {
            $this->options['class'] = 'armrck-touchspin ' . $this->options['class'];
        }
        $this->registerTouchSpinAsset();
        parent::init();
    }

    public function run() {
        parent::run();
        \yii\helpers\VarDumper::dump($this->items, 10, true);
        return $this->render('widget', [
                    'model' => $this->model,
                    'attribute' => $this->attribute,
                    'name_field_1' => $this->name_field_1,
                    'name_field_2' => $this->name_field_2,
                    'items' => $this->items,
                    'widget' => $this
        ]);
    }

    /**
     * Register widget asset.
     */
    public function registerTouchSpinAsset() {
        $view = $this->getView();
        TouchSpinAsset::register($view);
    }

}
