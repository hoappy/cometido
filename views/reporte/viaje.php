<?php

use app\models\Vehiculo;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(); ?>
<div class="card card-info">
    <div class="card-header">
        <h1 class="card-title">Reporte de Km de vehiculos por rango de meses seleccionado</h1>
    </div>
    <div class="card-body">

        <div class="form-row">
            <div class="col-md">
                <?= $form->field($fecha, 'inicio')->textInput(['type' => 'date']) ?>
            </div>
            <div class="col-md">
                <?= $form->field($fecha, 'fin')->textInput(['type' => 'date']) ?>
            </div>
            <div class="col-md">
                <?= $form->field($fecha, 'id')
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
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
<div class="row">
    <div class="col-md">
        <div class="card card-info">
            <div class="card-body">
                <?= $chartGoogleKilometros ?>
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="card card-info">
            <div class="card-body">
                <?= $chartGoogleLitros ?>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md">
        <div class="card card-info">
            <div class="card-body">
                <?= $chartGooglePesos ?>
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="card card-info">
            <div class="card-body">
                <?php if ($model != null) {
                    echo GridView::widget([
                        'dataProvider' => $model,
                        'columns' => [
                            //['class' => 'yii\grid\SerialColumn'],

                            [
                                'label' => 'Mes',
                                'value' =>

                                function ($model) {
                                    if ($model['mes'] == '1') {
                                        return 'Enero';
                                    };
                                    if ($model['mes'] == '2') {
                                        return 'Febrero';
                                    };
                                    if ($model['mes'] == '3') {
                                        return 'Marzo';
                                    };
                                    if ($model['mes'] == '4') {
                                        return 'Abril';
                                    };
                                    if ($model['mes'] == '5') {
                                        return 'Mayo';
                                    };
                                    if ($model['mes'] == '6') {
                                        return 'Junio';
                                    };
                                    if ($model['mes'] == '7') {
                                        return 'Julio';
                                    };
                                    if ($model['mes'] == '8') {
                                        return 'Agosto';
                                    };
                                    if ($model['mes'] == '9') {
                                        return 'Septiembre';
                                    };
                                    if ($model['mes'] == '10') {
                                        return 'Octubre';
                                    };
                                    if ($model['mes'] == '11') {
                                        return 'Noviembre';
                                    };
                                    if ($model['mes'] == '12') {
                                        return 'Diciembre';
                                    };

                                    return 'ERROR';
                                }


                            ],
                            'marca',
                            'modelo',
                            'patente',
                            'litros',
                            'pesos',
                            'kilometros',

                        ],
                    ]);
                } ?>
            </div>
        </div>
    </div>
</div>