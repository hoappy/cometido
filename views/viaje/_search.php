<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ViajeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="viaje-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_viaje') ?>

    <?= $form->field($model, 'hora_salida') ?>

    <?= $form->field($model, 'hora_llegada') ?>

    <?= $form->field($model, 'combustible_litros') ?>

    <?= $form->field($model, 'combustible_pesos') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
