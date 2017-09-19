<?php

/**
 * @var \yii\db\ActiveRecord $model
 * @var \armrck\touchspin\TouchSpin $items
 * @author Armando Ricardo Nogueira <armandoricky@gmail.com>
 */
use yii\bootstrap\Html;
?>

<div class="armrck-touchspin-list">
    <?php if (count($items) > 0) : ?>
        <?php
        end($items); // move o ponteiro interno para o final do array 
        $lastKey = key($items); // retorna o ultimo indice do array
        ?>
        <?php foreach ($items as $k => $item) : ?>                        
            <div class="armrck-touchspin-entry" data-key="<?= $k; ?>">
                <?php
                if (count($items) > 1 && $k == 0) { // Desativar p/ impedir a própria remoção
                    $btn_action_class = 'btn btn-default disabled';
                    $btn_action_icon = 'fa fa-plus';
                } elseif ($k == $lastKey) { // Configurar botão para adicionar
                    $btn_action_class = 'btn btn-success armrck-touchspin-add';
                    $btn_action_icon = 'fa fa-plus';
                } else {
                    // Configurar botão para remover
                    $btn_action_class = 'btn btn-danger armrck-touchspin-remove';
                    $btn_action_icon = 'fa fa-trash';
                }
                ?>
                <div class="input-group">
                    <?php echo Html::activeInput('text', $model, $attribute1 . "[]", ['value' => $item[$attribute1], 'class' => 'form-control']); ?> 
                    <span class="input-group-btn">
                        <button class="btn btn-default decrescimo" type="button" tabindex="-1"><i class="fa fa-backward"></i></button>
                        <?php echo Html::activeInput('number', $model, $attribute2 . "[]", ['value' => $item[$attribute2], 'class' => 'form-control input-spin']) ?> 
                        <button class="btn btn-default acrescimo" type="button" tabindex="-1"><i class="fa fa-forward"></i></button>
                        <button class="<?= $btn_action_class; ?>" type="button"><i class="<?= $btn_action_icon; ?>"></i> Campo</button>
                    </span>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="armrck-touchspin-entry" data-key="1">
            <div class="input-group">
                <?php echo Html::activeInput('text', $model, $attribute1 . "[]", ['value' => '', 'class' => 'form-control']) ?> 
                <span class="input-group-btn">
                    <button class="btn btn-default decrescimo" type="button" tabindex="-1"><i class="fa fa-backward"></i></button>
                    <?php echo Html::activeInput('number', $model, $attribute2 . "[]", ['value' => '', 'class' => 'form-control input-spin']) ?> 
                    <button class="btn btn-default acrescimo" type="button" tabindex="-1"><i class="fa fa-forward"></i></button>
                    <button class="btn btn-success armrck-touchspin-add" type="button"><i class="fa fa-plus"></i> Campo</button>
                </span>
            </div>
        </div>
    <?php endif; ?>
</div>