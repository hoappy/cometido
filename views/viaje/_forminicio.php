<?php

use app\models\Vehiculo;
use yii\helpers\ArrayHelper;
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
            <?= $form->field($model, 'hora_salida')->textInput(['type' => 'time']) ?>
        </div>
        <div class="col-md">
            <?= $form->field($model, 'kilometros_salida')->textInput(['type' => 'number']) ?>
        </div>
        <div class="col-md">
            <?php //aqui el chofer tendra que seleccionar el vehiculo a ocupar en el cometi
            echo  $form->field($model, 'fk_id_vehiculo')
                ->dropDownList(
                    ArrayHelper::map(
                        Vehiculo::find()->all(),
                        'id_vehiculo',
                        function ($query) {
                            return $query['marca'] . ' ' . $query['modelo'] . ' ' . $query['patente'];
                        }
                    ),
                    ['prompt' => 'Seleccione un Vehiculo']
                ) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>