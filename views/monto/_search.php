<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MontoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="monto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_monto') ?>

    <?= $form->field($model, 'monto_sin_pernoctar') ?>

    <?= $form->field($model, 'monto_con_pernoctar') ?>

    <?= $form->field($model, 'grado') ?>

    <?= $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'fk_id_item') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
