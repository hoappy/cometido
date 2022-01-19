<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MontoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listado Montos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monto-index">
    <div class="card card-info">
        <div class="card-header">
            <div>

                <h3 class="card-title"><b><?= Html::encode($this->title) ?></b></h3>

                <p class="text-right">
                    <?= Html::a('Agregar Monto', ['create'], ['class' => 'btn btn-secondary font-weight-bold']) ?>
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

                    //'id_monto',
                    'monto_sin_pernoctar',
                    'monto_con_pernoctar',
                    'grado',
                    //'estado',
                    [
                        'label'  => 'Item Presupuestario',
                        'value'  => function ($model) {
                            return $model->fkIdItem->nombre_item;
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