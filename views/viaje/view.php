<?php

use app\models\User;
use app\models\Users;
use app\models\Vehiculo;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Viaje */

\yii\web\YiiAsset::register($this);
$this->title = 'Viaje numero: '.$model->id_viaje ;
$this->params['breadcrumbs'][] = ['label' => 'Listado de Viajes Finalizados', 'url' => ['cometidos3']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="viaje-view">
<div class="card card-info">
        <div class="card-header">
            <div>
                <p>
                <h3 class="card-title"><b><?= Html::encode($this->title) ?></b></h3>
                </p>
            </div>
        </div>
        <div class="card-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_viaje',
            'hora_salida',
            'hora_llegada',
            'combustible_litros',
            'combustible_pesos',
            'kilometros_salida',
            'kilometros_llegada',
            'kilometros_total',
            //'estado',
            'observaciones',
            [
                'label' => 'Vehiculo',
                'value' => function($model){
                    $vehiculo = Vehiculo::findOne($model->fk_id_vehiculo);
                    return $vehiculo->marca . '  ' . $vehiculo->modelo .'  ' . $vehiculo->patente;
                    //return $model->vehiculo->marca;
                }
            ],
            [
                'label' => 'Chofer',
                'value' => function($model){
                    $user = Users::findOne($model->fk_id);
                    return $user->nombre . ' ' . $user->rut . '-' . $user->dv($user->rut);
                }
            ],
            //'fk_id_vehiculo',
            //'fk_id_cometido',
            //'fk_id',
        ],
    ]) ?>

</div>
