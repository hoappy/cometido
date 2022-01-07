<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sector */

$this->title = $model->fkIdCiudad->nombre_ciudad . ' - ' . $model->nombre_sector;
$this->params['breadcrumbs'][] = ['label' => 'Sectors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sector-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_sector], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_sector], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás segura de que quieres eliminar este artículo?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_sector',
            'nombre_sector',
            'estado',
            [
                'label'  => 'Ciudad',
                'value'  => function ($model) {
                    return $model->fkIdCiudad->nombre_ciudad;
                },
            ],
        ],
    ]) ?>

</div>
