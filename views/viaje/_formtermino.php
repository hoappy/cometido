<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Viaje */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="viaje-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-row">
        <div class="col-md">
            <?= $form->field($model, 'hora_llegada')->textInput(['type' => 'time']) ?>
        </div>
        <div class="col-md">
            <?= $form->field($model, 'combustible_litros')->textInput(['type' => 'number']) ?>
        </div>
        <div class="col-md">
            <?= $form->field($model, 'combustible_pesos')->textInput(['type' => 'number']) ?>
        </div>
        <div class="col-md">
            <?= $form->field($model, 'kilometros_llegada')->textInput(['type' => 'number']) ?>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md">
            <?php //las obserbaciones se ingresaran junto a hora llegada y kilometros de llegada
            echo $form->field($model, 'observaciones')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <?php // se calcula autmaticante como (kilometros_llegada - kilometros_salida)
    //lo siguiente se calculara en el controlador una vez ingresado todos los datos
    //$model->kilometros_total = ($model->kilometros_llegada-$model->kilometros_salida);
    $form->field($model, 'kilometros_total')->textInput(['type' => 'number', 'readonly' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>