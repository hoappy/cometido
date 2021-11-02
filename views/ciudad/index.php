<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CiudadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ciudads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ciudad-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ciudad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_ciudad',
            'nombre_ciudad',
            'fk_id_provincia',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
