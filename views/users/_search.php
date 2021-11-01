<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'mail') ?>

    <?= $form->field($model, 'rut') ?>

    <?= $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'grado') ?>

    <?php // echo $form->field($model, 'tipo_funcionario') ?>

    <?php // echo $form->field($model, 'role') ?>

    <?php // echo $form->field($model, 'fk_id_departamento') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
