<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cometido */

$this->title = $model->id_cometido;
$this->params['breadcrumbs'][] = ['label' => 'Cometidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cometido-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_cometido], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_cometido], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_cometido',
            'con_viatico',
            'dias_sin_pernoctar',
            'dias_con_pernoctar',
            'monto',
            'fecha_inicio',
            'fecha_fin',
            'hora_inicio',
            'hora_fin',
            'motivo_cometido',
            'tranporte_ida',
            'transporte_regreso',
            'estado',
            'descreipcion',
            'fk_id_item',
            'fk_id',
            'fk_id_director',
        ],
    ]) ?>

</div>
