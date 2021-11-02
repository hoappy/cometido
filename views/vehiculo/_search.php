<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VehiculoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehiculo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_vehiculo') ?>

    <?= $form->field($model, 'patente') ?>

    <?= $form->field($model, 'modelo') ?>

    <?= $form->field($model, 'marca') ?>

    <?= $form->field($model, 'tipo_combustible') ?>

    <?php // echo $form->field($model, 'num_chasis') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'kilometraje') ?>

    <?php // echo $form->field($model, 'rendimiento') ?>

    <?php // echo $form->field($model, 'fk_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
