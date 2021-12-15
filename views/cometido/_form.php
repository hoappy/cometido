<?php

use app\models\ItemPresupuestario;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cometido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cometido-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-row">
        <div class="col-md">
            <?php //corresponde pago de viatico cuando este es ayor a 5 horas
            //la formula para calcularlo es de (n-1) siendo n la cantidad de dias
            echo $form->field($model, 'con_viatico')->dropDownList(
                [
                    '0' => 'No',
                    '1' => 'Si',
                ],
                ['prompt' => 'Seleccion si corresponde Viatico']
            );
            ?>
        </div>
        <div class="col-md">
            <?= $form->field($model, 'dias_sin_pernoctar')->textInput(['type' => 'number'])->hint('Ingrese el Numero de Dias') ?>
        </div>
        <div class="col-md">
            <?= $form->field($model, 'dias_con_pernoctar')->textInput(['type' => 'number'])->hint('Ingrese el Numero de Dias') ?>
        </div>
    </div>


    <div class="form-row">
        <div class="col-md">
            <?= $form->field($model, 'fecha_inicio')->textInput(['type' => 'date']) ?>
        </div>
        <div class="col-md">
            <?= $form->field($model, 'fecha_fin')->textInput(['type' => 'date']) ?>
        </div>
        <div class="col-md">
            <?= $form->field($model, 'hora_inicio')->textInput(['type' => 'time']) ?>
        </div>
        <div class="col-md">
            <?= $form->field($model, 'hora_fin')->textInput(['type' => 'time']) ?>
        </div>
    </div>

    <?= $form->field($model, 'motivo_cometido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descreipcion')->textInput(['maxlength' => true]) ?>

    <div class="form-row">
        <div class="col-md">
            <?php
            echo $form->field($model, 'tranporte_ida')->dropDownList(
                [
                    '0' => 'Vehiculo SERVIU',
                    '1' => 'Locomocion Colectiva',
                    '2' => 'Bus Inter Urbano',
                    '3' => 'Taxi / Uber / Didi / Cabify',
                    '4' => 'Personal',
                ],
                ['prompt' => 'Seleccion Transporte de Ida']
            );
            ?>
        </div>
        <div class="col-md">
            <?php
            echo $form->field($model, 'transporte_regreso')->dropDownList(
                [
                    '0' => 'Vehiculo SERVIU',
                    '1' => 'Locomocion Colectiva',
                    '2' => 'Bus Inter Urbano',
                    '3' => 'Taxi / Uber / Didi / Cabify',
                    '4' => 'Personal',
                ],
                ['prompt' => 'Seleccion Transporte de Regreso']
            );
            ?>
        </div>
        <div class="col-md">
            <?= $form->field($model, 'fk_id_item')
                ->dropDownList(
                    ArrayHelper::map(
                        ItemPresupuestario::find()->all(),
                        'id_item',
                        function ($query) {
                            return $query['nombre_item'] . ' - ' . $query['porcentaje'] . '%';
                        }
                    ),
                    ['prompt' => 'Seleccione un Item Presupuestario']
                ) ?>
        </div>
    </div>

    <?php // $form->field($model, 'estado')->textInput() 
    ?>

    <?php //  $form->field($model, 'fk_id_funcionario')->textInput() 
    ?>

    <?php //  $form->field($model, 'fk_id_director')->textInput() 
    ?>

    <?php //  $form->field($model, 'fk_id_jefe')->textInput() 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Enviar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>