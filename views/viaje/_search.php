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

    <?php // echo $form->field($model, 'kilometros_salida') ?>

    <?php // echo $form->field($model, 'kilometros_llegada') ?>

    <?php // echo $form->field($model, 'kilometros_total') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'fk_id_vehiculo') ?>

    <?php // echo $form->field($model, 'fk_id_cometido') ?>

    <?php // echo $form->field($model, 'fk_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
