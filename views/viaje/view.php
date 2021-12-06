<?php

use app\models\User;
use app\models\Users;
use app\models\Vehiculo;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Viaje */

$this->title = $model->id_viaje;
//$this->params['breadcrumbs'][] = ['label' => 'Viajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="viaje-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_viaje], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_viaje], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
                    $vehiculo = Vehiculo::find()->where('id_vehiculo', $model->fk_id_vehiculo)->one();
                    return $vehiculo['marca'] . ' ' . $vehiculo['modelo'] .' ' . $vehiculo['patente'];
                }
            ],
            /*[
                'label' => 'Chofer',
                'value' => function($model){
                    $user = Users::find()->where('id', $model->fk_id)->one();
                    return $user['nombre'] . ' ' . $user['rut'] . '-' . $user->dv($user['rut']);
                }
            ],*/
            //'fk_id_vehiculo',
            //'fk_id_cometido',
            //'fk_id',
        ],
    ]) ?>

</div>
