<?php

use app\models\User;
use app\models\Viaje;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CometidoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $titulo;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cometido-index">

    <div class="card card-info">
        <div class="card-header">
            <div>
                <p>
                <h3 class="card-title"><b><?= Html::encode($this->title) ?></b></h3>
                </p>
            </div>
        </div>
        <div class="card-body">

            <?= GridView::widget([
                'dataProvider' => $model,
                'columns' => [
                    //['class' => 'yii\grid\SerialColumn'],

                    //'id_cometido',
                    //'con_viatico',
                    //'dias_sin_pernoctar',
                    //'dias_con_pernoctar',
                    //'monto',
                    'fecha_inicio',
                    'hora_inicio',
                    'fecha_fin',
                    'hora_fin',
                    //'motivo_cometido',
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
                            return 'ERROR';
                        }

                    ],
                    //'descreipcion',
                    //'fk_id_item',
                    //'fk_id',
                    //'fk_id_director',
                    //User::isUserChofer(Yii::$app->user->identity->id) ?
                    //['class' => 'yii\grid\ActionColumn'],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{ver}{link}',
                        'buttons' => [
                            'link' => function ($url, $model, $key) {
                                if ($model['estado'] == '3') {
                                    return Html::a('<a class="btn btn-success" href="index.php?r=viaje/create&id=' . $model['id_cometido'] . '">Asignar</a>');
                                }
                                if ($model['estado'] == '4') {
                                    return Html::a('<a class="btn btn-success" href="index.php?r=viaje/salida&id=' . $model['id_cometido'] . '">Iniciar</a>');
                                }
                                if ($model['estado'] == '5') {
                                    return Html::a('<a class="btn btn-success" href="index.php?r=viaje/llegada&id=' . $model['id_cometido'] . '">Llegar</a>');
                                }
                            },
                            'ver' => function ($url, $model, $key) {

                                $viaje = Viaje::find()->where(['fk_id_cometido' => $model['id_cometido']])->one();

                                //return $viaje['id_viaje'] . ' - ' . $viaje['fk_id_cometido'] . ' - ' . $model['id_cometido'];

                                if ($viaje != null && $model['estado'] != '3') {
                                    return Html::a('<a class="btn btn-primary" href="index.php?r=viaje/view&id=' . $viaje->id_viaje . '">Ver Viaje</a>');
                                }
                            },
                        ],
                    ]
                    /*:
            [
                'label' => 'ESTADO',
                'value' => 'Ya ha sido asignado'
            ],*/

                ],
                'pager' => [
                    'options' => ['class' => 'pagination justify-content-center'],
                    'pageCssClass' => 'page-item',
                    'linkOptions' => ['class' => 'page-link'],
                ],
            ]); ?>


        </div>
    </div>
</div>