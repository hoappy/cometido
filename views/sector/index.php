<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SectorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sectors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sector-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sector', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_sector',
            'nombre_sector',
            'fk_id_ciudad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
