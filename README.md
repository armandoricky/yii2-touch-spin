

Yii2-TouchSpin
==============

![example](https://raw.githubusercontent.com/armandoricky/yii2-touch-spin/master/screenshot/armrck-touch-spin-example.JPG)

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
        'collection' => 'expectativa', // Name for your collection (Array) POST
        'attribute1' => 'item', // Attribute1 in your Model. E.g. name="Model[expectativa][0][item]"
        'attribute2' => 'item_qtd_aluno', // Attribute2 in your Model. E.g. name="Model[expectativa][0][item_qtd_aluno]"
        'items' => ArrayHelper::toArray($model->alunoExpectativaItens), // Your Array
        'options' => [
            'class' => 'form-control'
        ]
    ]);
?>
```

