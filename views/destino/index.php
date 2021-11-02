<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DestinoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Destinos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="destino-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Destino', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_destino',
            'fk_id_cometido',
            'fk_id_sector',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
