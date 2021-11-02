<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ModificacionComitidoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="modificacion-comitido-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_modificacion') ?>

    <?= $form->field($model, 'fecha_fin') ?>

    <?= $form->field($model, 'hora_fin') ?>

    <?= $form->field($model, 'transporte_regreso') ?>

    <?= $form->field($model, 'transporte_ida') ?>

    <?php // echo $form->field($model, 'con_viatico') ?>

    <?php // echo $form->field($model, 'dias_sin_pernoctar') ?>

    <?php // echo $form->field($model, 'dias_con_pernoctar') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'fk_id_cometido') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
