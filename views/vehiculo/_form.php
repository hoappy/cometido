<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vehiculo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehiculo-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'patente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'tipo_combustible')->textInput() 
    ?>

    <?php
    echo $form->field($model, 'tipo_combustible')->dropDownList(
        [
            '0' => '93',
            '1' => '95',
            '2' => '97',
            '3' => 'diesel',
        ],
        ['prompt' => 'Seleccion Tipo de Compustible']
    );
    ?>

    <?= $form->field($model, 'num_chasis')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'kilometraje')->textInput() ?>

    <?= $form->field($model, 'rendimiento')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>