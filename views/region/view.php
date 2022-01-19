<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Region */

$this->title = $model->nombre_region;
$this->params['breadcrumbs'][] = ['label' => 'listado de Regiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="region-view">
    <div class="card card-info">
        <div class="card-header">
            <div>
                <p class="text-left">
                <h3 class="card-title"><b><?= Html::encode($this->title) ?></b></h3>
                </p>
                <p class="text-right">
                    <?= Html::a('Actualizar', ['update', 'id' => $model->id_region], ['class' => 'btn btn-secondary']) ?>
                    <?= Html::a('Eliminar', ['delete', 'id' => $model->id_region], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => '¿Estás segura de que quieres eliminar este artículo?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>
            </div>
        </div>
        <div class="card-body">

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id_region',
                    'nombre_region',
                    'numero_region',
                    //'estado',
                ],
            ]) ?>

        </div>
    </div>
</div>