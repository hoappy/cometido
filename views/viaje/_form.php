<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Viaje */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="viaje-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hora_salida')->textInput() ?>

    <?= $form->field($model, 'hora_llegada')->textInput() ?>

    <?= $form->field($model, 'combustible_litros')->textInput() ?>

    <?= $form->field($model, 'combustible_pesos')->textInput() ?>

    <?= $form->field($model, 'kilometros_salida')->textInput() ?>

    <?= $form->field($model, 'kilometros_llegada')->textInput() ?>

    <?= $form->field($model, 'kilometros_total')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <?= $form->field($model, 'observaciones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fk_id_vehiculo')->textInput() ?>

    <?= $form->field($model, 'fk_id_cometido')->textInput() ?>

    <?= $form->field($model, 'fk_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
