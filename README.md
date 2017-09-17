

Yii2-TouchSpin
==============

![example](https://raw.githubusercontent.com/armandoricky/armrck-touchspin/master/screenshot/armrck-touch-spin-example.JPG)

A Yii2 input widget extension for manage lists with item and quantity.

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
        'attribute' => 'expectativa',
        'name_field_1' => 'item', // E.g. name="Model[expectativa][0][item]"
        'name_field_2' => 'item_qtd_aluno', // E.g. name="Model[expectativa][0][item_qtd_aluno]"
        'items' => ArrayHelper::toArray($model->alunoExpectativaItens),
        'options' => [
            'class' => 'form-control'
        ]
    ]);
?>
```

