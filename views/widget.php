<?php
/**
 * A Yii2 input widget extension for manage touch spin with fields item and item_qtd.
 *
 * @author ARMANDO RICARDO NOGUEIRA on 16/09/2017
 * @package armrck\touchspin
 */

/**
 * @var \yii\db\ActiveRecord $model
 * @var \yii\db\ActiveRecord $items
 */
?>

<div class="armrck-touchspin-list">
    <?php if (count($items) > 0) : ?>
        <?php
        end($items); // Move o ponteiro interno para o final do array 
        $lastKey = key($items); // Retorna o ultimo indice do array
        ?>
        <?php foreach ($items as $k => $item) : ?>                        
            <div class="armrck-touchspin-entry" data-key="<?= $k; ?>">
                <?php
                if (count($items) > 1 && $k == 0) { // se total maior 1 e se primeiro item do array
                    $btn_action_class = 'btn btn-default disabled';
                    $btn_action_icon = 'fa fa-plus';
                } elseif ($k == $lastKey) { // se valor igual ao ultimo indice do array
                    $btn_action_class = 'btn btn-success armrck-touchspin-add';
                    $btn_action_icon = 'fa fa-plus';
                } else {
                    $btn_action_class = 'btn btn-danger armrck-touchspin-remove';
                    $btn_action_icon = 'fa fa-trash';
                }
                ?>
                <div class="input-group">
                    <input type="text" class="form-control" value="<?= $item[$name_field_1]; ?>" name="<?= \yii\helpers\StringHelper::basename(get_class($model)) . "[$attribute][$k][$name_field_1]"; ?>">
                    <span class="input-group-btn">
                        <button class="btn btn-default decrescimo" type="button"><i class="fa fa-backward"></i></button>
                        <input type="text" class="input-spin" value="<?= $item[$name_field_2]; ?>" name="<?= \yii\helpers\StringHelper::basename(get_class($model)) . "[$attribute][$k][$name_field_2]" ?>">
                        <button class="btn btn-default acrescimo" type="button"><i class="fa fa-forward"></i></button>
                        <button class="<?= $btn_action_class; ?>" type="button"><i class="<?= $btn_action_icon; ?>"></i> Campo</button>
                    </span>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="armrck-touchspin-entry" data-key="1">
            <div class="input-group">
                <input type="text" class="form-control" value="" name="<?= \yii\helpers\StringHelper::basename(get_class($model)) . "[$attribute][0][$name_field_1]"; ?>">
                <span class="input-group-btn">
                    <button class="btn btn-default decrescimo" type="button"><i class="fa fa-backward"></i></button>
                    <input type="text" class="input-spin" value="" name="<?= \yii\helpers\StringHelper::basename(get_class($model)) . "[$attribute][0][$name_field_2]" ?>">
                    <button class="btn btn-default acrescimo" type="button"><i class="fa fa-forward"></i></button>
                    <button class="btn btn-success armrck-touchspin-add" type="button"><i class="fa fa-plus"></i> Campo</button>
                </span>
            </div>
        </div>
    <?php endif; ?>
</div>