<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Monto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="monto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_monto')->textInput() ?>

    <?= $form->field($model, 'monto_sin_pernoctar')->textInput() ?>

    <?= $form->field($model, 'monto_con_pernoctar')->textInput() ?>

    <?= $form->field($model, 'grado')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <?= $form->field($model, 'fk_id_item')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
