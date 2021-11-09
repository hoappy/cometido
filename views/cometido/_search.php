<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CometidoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cometido-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cometido') ?>

    <?= $form->field($model, 'con_viatico') ?>

    <?= $form->field($model, 'dias_sin_pernoctar') ?>

    <?= $form->field($model, 'dias_con_pernoctar') ?>

    <?= $form->field($model, 'monto') ?>

    <?php // echo $form->field($model, 'fecha_inicio') ?>

    <?php // echo $form->field($model, 'fecha_fin') ?>

    <?php // echo $form->field($model, 'hora_inicio') ?>

    <?php // echo $form->field($model, 'hora_fin') ?>

    <?php // echo $form->field($model, 'motivo_cometido') ?>

    <?php // echo $form->field($model, 'tranporte_ida') ?>

    <?php // echo $form->field($model, 'transporte_regreso') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'descreipcion') ?>

    <?php // echo $form->field($model, 'fk_id_item') ?>

    <?php // echo $form->field($model, 'fk_id_funcionario') ?>

    <?php // echo $form->field($model, 'fk_id_director') ?>

    <?php // echo $form->field($model, 'fk_id_jefe') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
