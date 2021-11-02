<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ModificacionComitido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="modificacion-comitido-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha_fin')->textInput() ?>

    <?= $form->field($model, 'hora_fin')->textInput() ?>

    <?= $form->field($model, 'transporte_regreso')->textInput() ?>

    <?= $form->field($model, 'transporte_ida')->textInput() ?>

    <?= $form->field($model, 'con_viatico')->textInput() ?>

    <?= $form->field($model, 'dias_sin_pernoctar')->textInput() ?>

    <?= $form->field($model, 'dias_con_pernoctar')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <?= $form->field($model, 'fk_id_cometido')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
