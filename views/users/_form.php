<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rut')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <?= $form->field($model, 'grado')->textInput() ?>

    <?= $form->field($model, 'tipo_funcionario')->textInput() ?>

    <?= $form->field($model, 'role')->textInput() ?>

    <?= $form->field($model, 'fk_id_departamento')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
