<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ViajeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Viajes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="viaje-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Viaje', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_viaje',
            'hora_salida',
            'hora_llegada',
            'combustible_litros',
            'combustible_pesos',
            //'kilometros_salida',
            //'kilometros_llegada',
            //'kilometros_total',
            //'estado',
            //'observaciones',
            //'fk_id_vehiculo',
            //'fk_id_cometido',
            //'fk_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
