<?php

use app\models\User;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CometidoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cometidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cometido-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cometido', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

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
            'fecha_fin',
            //'hora_inicio',
            //'hora_fin',
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
                'template' => '{link}',
                'buttons' => [
                    'link' => function ($url, $model, $key) {
                        if($model['estado'] == '3'){
                            return Html::a('<a class="btn btn-success" href="index.php?r=viaje/create&id=' . $model['id_cometido'] . '">Asignar</a>');
                        }
                        if($model['estado'] == '4'){
                            return Html::a('<a class="btn btn-success" href="index.php?r=viaje/salida&id=' . $model['id_cometido'] . '">Salir</a>');
                        }
                        if($model['estado'] == '5'){
                            return Html::a('<a class="btn btn-success" href="index.php?r=viaje/llegada&id=' . $model['id_cometido'] . '">Llegar</a>');
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
    ]); ?>


</div>