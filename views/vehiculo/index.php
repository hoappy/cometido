<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VehiculoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vehiculos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehiculo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Agregar un Vehiculo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_vehiculo',
            'patente',
            'modelo',
            'marca',
            [
                'label' => 'Tipo de Combustible',
                'value' => 
                
                function ($model) {
                    if($model->tipo_combustible == '0'){
                        return '93';
                    };
                    if($model->tipo_combustible == '1'){
                        return '95';
                    };
                    if($model->tipo_combustible == '2'){
                        return '97';
                    };
                    if($model->tipo_combustible == '3'){
                        return 'Diesel';
                    };
                    return 'ERROR';
                }
                

            ] ,
            'num_chasis',
            //'estado',
            'kilometraje',
            //'rendimiento',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
