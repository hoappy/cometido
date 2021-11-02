<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ModificacionComitido */

$this->title = $model->id_modificacion;
$this->params['breadcrumbs'][] = ['label' => 'Modificacion Comitidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="modificacion-comitido-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_modificacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_modificacion], [
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
            'id_modificacion',
            'fecha_fin',
            'hora_fin',
            'transporte_regreso',
            'transporte_ida',
            'con_viatico',
            'dias_sin_pernoctar',
            'dias_con_pernoctar',
            'estado',
            'fk_id_cometido',
        ],
    ]) ?>

</div>
