<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CometidoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cometidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cometido-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cometido', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_cometido',
            'con_viatico',
            'dias_sin_pernoctar',
            'dias_con_pernoctar',
            'monto',
            //'fecha_inicio',
            //'fecha_fin',
            //'hora_inicio',
            //'hora_fin',
            //'motivo_cometido',
            //'tranporte_ida',
            //'transporte_regreso',
            //'estado',
            //'descreipcion',
            //'fk_id_item',
            //'fk_id',
            //'fk_id_director',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
