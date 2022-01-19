<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VehiculoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listado de Vehiculos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehiculo-index">

    <div class="card card-info">
        <div class="card-header">
            <div>
                <p>
                <h3 class="card-title"><b><?= Html::encode($this->title) ?></b></h3>
                </p>
                <p class="text-right">
                    <?= Html::a('Agregar Vehiculo', ['create'], ['class' => 'btn btn-secondary font-weight-bold']) ?>
                </p>
            </div>
        </div>
        <div class="card-body">

            <?php // echo $this->render('_search', ['model' => $searchModel]); 
            ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
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
                            if ($model->tipo_combustible == '0') {
                                return '93';
                            };
                            if ($model->tipo_combustible == '1') {
                                return '95';
                            };
                            if ($model->tipo_combustible == '2') {
                                return '97';
                            };
                            if ($model->tipo_combustible == '3') {
                                return 'Diesel';
                            };
                            return 'ERROR';
                        }


                    ],
                    'num_chasis',
                    //'estado',
                    'kilometraje',
                    //'rendimiento',

                    ['class' => 'yii\grid\ActionColumn'],
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