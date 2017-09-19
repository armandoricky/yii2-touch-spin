Yii2-TouchSpin
==============

![example](https://w3bsistemas.com/shared/yii2-touch-spin/armrck-touch-spin-demo.gif)

A Yii2 input widget extension for manage lists of input spinner with field text and field numeric.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require --prefer-dist armrck/yii2-touchspin "*"
```

or add

```
"armrck/yii2-touchspin": "*"
```

to the require section of your `composer.json` file.

Usage
-----

Once the extension is installed, simply use it in your code by :

```php
<?= TouchSpin::widget([
        'model' => $model, 
        'attribute1' => 'item', // Attribute 1 in your Model
        'attribute2' => 'item_qtd_aluno', // Attribute 2 in your Model
        'items' => ArrayHelper::toArray($model->alunoExpectativaItens) // Array
    ]);
?>
```

