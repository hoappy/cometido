<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ModificacionComitidoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Modificacion Comitidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modificacion-comitido-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Modificacion Comitido', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_modificacion',
            'fecha_fin',
            'hora_fin',
            'transporte_regreso',
            'transporte_ida',
            //'con_viatico',
            //'dias_sin_pernoctar',
            //'dias_con_pernoctar',
            //'estado',
            //'fk_id_cometido',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
