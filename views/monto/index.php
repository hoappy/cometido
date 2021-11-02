<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MontoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Montos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Monto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_monto',
            'monto_sin_pernoctar',
            'monto_con_pernoctar',
            'grado',
            'estado',
            //'fk_id_item',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
