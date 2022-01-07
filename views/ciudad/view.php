<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ciudad */

$this->title = $model->nombre_ciudad;
$this->params['breadcrumbs'][] = ['label' => 'Ciudads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ciudad-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_ciudad], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_ciudad], [
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
            //'id_ciudad',
            'nombre_ciudad',
            'estado',
            [
                'label'  => 'provincia',
                'value'  => function ($model) {
                    return $model->fkIdProvincia->nombre_provincia;
                },
            ],
        ],
    ]) ?>

</div>
