<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CiudadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listado de Ciudades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ciudad-index">
    <div class="card card-info">
        <div class="card-header">
            <div>
                <p class="text-left">
                    <h3 class="card-title"><b><?= Html::encode($this->title) ?></b></h3>
                </p>
                <p class="text-right">
                    <?= Html::a('Agregar Ciudad', ['create'], ['class' => 'btn btn-secondary font-weight-bold']) ?>
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

                    //'id_ciudad',
                    'nombre_ciudad',
                    //'estado',
                    [
                        'label'  => 'Provincia',
                        'value'  => function ($model) {
                            return $model->fkIdProvincia->nombre_provincia;
                        },
                    ],
                    [
                        'label'  => 'Region',
                        'value'  => function ($model) {
                            return $model->fkIdProvincia->fkIdRegion->nombre_region;
                        },
                    ],

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