<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ItemPresupuestarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listado de Item Presupuestarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-presupuestario-index">
    <div class="card card-info">
        <div class="card-header">
            <div>
                
                <h3 class="card-title"><b><?= Html::encode($this->title) ?></b></h3>
               
                <p class="text-right">
                    <?= Html::a('Agregar un Item Presupuestario', ['create'], ['class' => 'btn btn-secondary font-weight-bold']) ?>
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

                    //'id_item',
                    'nombre_item',
                    'porcentaje',
                    //'estado',
                    'descripcion',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>