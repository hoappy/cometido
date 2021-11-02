<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cometido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cometido-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'con_viatico')->textInput() ?>

    <?= $form->field($model, 'dias_sin_pernoctar')->textInput() ?>

    <?= $form->field($model, 'dias_con_pernoctar')->textInput() ?>

    <?= $form->field($model, 'monto')->textInput() ?>

    <?= $form->field($model, 'fecha_inicio')->textInput() ?>

    <?= $form->field($model, 'fecha_fin')->textInput() ?>

    <?= $form->field($model, 'hora_inicio')->textInput() ?>

    <?= $form->field($model, 'hora_fin')->textInput() ?>

    <?= $form->field($model, 'motivo_cometido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tranporte_ida')->textInput() ?>

    <?= $form->field($model, 'transporte_regreso')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <?= $form->field($model, 'descreipcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fk_id_item')->textInput() ?>

    <?= $form->field($model, 'fk_id')->textInput() ?>

    <?= $form->field($model, 'fk_id_director')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
