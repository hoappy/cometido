<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProvinciaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listado de Provincias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="provincia-index">

    <div class="card card-info">
        <div class="card-header">
            <div>
                <p>
                <h3 class="card-title"><b><?= Html::encode($this->title) ?></b></h3>
                </p>
                <p class="text-right">
                    <?= Html::a('Agregar Provincia', ['create'], ['class' => 'btn btn-secondary font-weight-bold']) ?>
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

                    //'id_provincia',
                    'nombre_provincia',
                    //'estado',
                    [
                        'label'  => 'Region',
                        'value'  => function ($model) {
                            return $model->fkIdRegion->nombre_region;
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