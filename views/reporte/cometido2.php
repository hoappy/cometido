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
</div>

<div class="form-group">
    <?= Html::submitButton('Buscar', ['class' => 'btn btn-success']) ?>
    <?php if ($fecha->inicio != 0) {
        echo Html::a('Generar PDF', ['pdfcometido2', 'inicio' => $fecha->inicio, 'fin' => $fecha->fin], ['class' => 'btn btn-primary']);
    } ?>
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
<div class="row">
    <div class="col-md">
        <?php if ($model != null) {
            echo  GridView::widget([
                'dataProvider' => $modelAll,
                //'filterModel' => $searchModel,
                'columns' => [
                    //['class' => 'yii\grid\SerialColumn'],

                    //'id_cometido',
                    [
                        'label' => 'Con Viatico',
                        'value' =>

                        function ($model) {
                            if ($model['con_viatico'] == '0') {
                                return 'No';
                            };
                            if ($model['con_viatico'] == '1') {
                                return 'Si';
                            };
                            return 'ERROR';
                        }


                    ],
                    //'dias_sin_pernoctar',
                    //'dias_con_pernoctar',
                    [
                        'label' => 'Monto Viatico',
                        'value' =>

                        function ($model) {
                            if ($model['con_viatico'] == '0') {
                                return 'No Aplica';
                            };
                            if ($model['con_viatico'] == '1') {
                                if ($model['monto'] == null) {
                                    return 'No Calculado';
                                }else{
                                    return $model['monto'];
                                };
                            };
                            return 'ERROR';
                        }


                    ],
                    //'monto',
                    'fecha_inicio',
                    'fecha_fin',
                    //'hora_inicio',
                    //'hora_fin',
                    'motivo_cometido',
                    //'tranporte_ida',

                    [
                        'label' => 'Transporte de IDA',
                        'value' =>

                        function ($model) {
                            if ($model['tranporte_ida'] == '0') {
                                return 'Vehiculo SERVIU';
                            };
                            if ($model['tranporte_ida'] == '1') {
                                return 'Locomocion Colectiva';
                            };
                            if ($model['tranporte_ida'] == '2') {
                                return 'Bus Inter Urbano';
                            };
                            if ($model['tranporte_ida'] == '3') {
                                return 'Taxi / Uber / Didi / Cabify';
                            };
                            if ($model['tranporte_ida'] == '4') {
                                return 'Personal';
                            };

                            return 'ERROR';
                        }


                    ],
                    //'transporte_regreso',

                    [
                        'label' => 'Transporte de REGRESO',
                        'value' =>

                        function ($model) {
                            if ($model['transporte_regreso'] == '0') {
                                return 'Vehiculo SERVIU';
                            };
                            if ($model['transporte_regreso'] == '1') {
                                return 'Locomocion Colectiva';
                            };
                            if ($model['transporte_regreso'] == '2') {
                                return 'Bus Inter Urbano';
                            };
                            if ($model['transporte_regreso'] == '3') {
                                return 'Taxi / Uber / Didi / Cabify';
                            };
                            if ($model['transporte_regreso'] == '4') {
                                return 'Personal';
                            };

                            return 'ERROR';
                        }


                    ],
                    //'estado',
                    [
                        'label' => 'ESTADO',
                        'value' =>

                        function ($model) {
                            if ($model['estado'] == '0') {
                                return 'Enviado por el Funcionario';
                            };
                            if ($model['estado'] == '1') {
                                return 'Aceptado por el Jefe Departamento';
                            };
                            if ($model['estado'] == '2') {
                                return 'Autorizado por el Director';
                            };
                            if ($model['estado'] == '3') {
                                return 'Vehiculo Pendiente de Asignacion';
                            };
                            if ($model['estado'] == '4') {
                                return 'Vehiculo Asignado';
                            };
                            if ($model['estado'] == '5') {
                                return 'En Cometido';
                            };
                            if ($model['estado'] == '6') {
                                return 'Cometido Finalizado';
                            };
                            if ($model['estado'] == '7') {
                                return 'Rechazado por Jefe Departamento';
                            };
                            if ($model['estado'] == '8') {
                                return 'Denegado por Director';
                            };
                            if ($model['estado'] == '9') {
                                return 'Cancelado por el Usuario';
                            };
                            if ($model['estado'] == '10') {
                                return 'Cancelado por Falta de Vehiculos';
                            };
                            if ($model['estado'] == '11') {
                                return 'Pendiente de Asignacion de Monto';
                            };

                            return 'ERROR';
                        }


                    ],
                    //'descreipcion',
                    //'fk_id_item',
                    //'fk_id',
                    [
                        'label' => 'Funcionario',
                        'value' => function($model){
                            $user = Users::findOne($model['fk_id_funcionario']);
                            return $user->nombre . ' ' . $user->rut . '-' . $user->dv($user->rut);
                        }
                    ],
                    //'fk_id_director',

                    //['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
        } ?>
    </div>
</div>