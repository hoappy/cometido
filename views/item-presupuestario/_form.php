<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ItemPresupuestario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-presupuestario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_item')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'porcentaje')->textInput() ?>

    <?php // $form->field($model, 'estado')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
