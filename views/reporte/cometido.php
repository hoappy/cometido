<?php

use app\models\Users;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(); ?>

<h1>Reporte de cometidos por rago de fechas y estado de un funcionario</h1>

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
                    Users::find()->all(),
                    'id',
                    function ($query) {
                        return $query['nombre'] . ' ' . $query['rut'] . '-' . Users::dv( $query['rut']);
                    }
                ),
                ['prompt' => 'Seleccione un Funcionario']
            ) ?>
    </div>
    <div class="col-md">
        <?php
            echo $form->field($fecha, 'estado')->dropDownList(
                [
                    '0' => 'Enviado por el Funcionario',
                    '1' => 'Aceptado por el Jefe Departamento',
                    '2' => 'Autorizado por el Director',
                    '3' => 'Vehiculo Pendiente de Asignacion',
                    '4' => 'Vehiculo Asignado',
                    '5' => 'En Cometido',
                    '6' => 'Cometido Finalizado',
                    '7' => 'Rechazado por Jefe Departamento',
                    '8' => 'Denegado por Director',
                    '9' => 'Cancelado por el Usuario',
                    '10' => 'Cancelado por Falta de Vehiculos'

                ],
                ['prompt' => 'Seleccion un estado']
            );
            ?>
    </div>
</div>

<div class="form-group">
    <?= Html::submitButton('Buscar', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

<div class="row">
    <div class="col-md">
        <?= $chartGoogleCantidad ?>
    </div>
    <div class="col-md">
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
                    'cantidad',
                ],
            ]);
        } ?>
    </div>
</div>