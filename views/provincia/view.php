<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Provincia */

$this->title = $model->nombre_provincia;
$this->params['breadcrumbs'][] = ['label' => 'Listado de Provincias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="provincia-view">
    <div class="card card-info">
        <div class="card-header">
            <div>
                <p class="text-left">
                <h3 class="card-title"><b><?= Html::encode($this->title) ?></b></h3>
                </p>
                <p class="text-right">
                    <?= Html::a('Actualizar', ['update', 'id' => $model->id_provincia], ['class' => 'btn btn-secondary']) ?>
                    <?= Html::a('Eliminar', ['delete', 'id' => $model->id_provincia], [
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
                    //'id_provincia',
                    'nombre_provincia',
                    'estado',
                    [
                        'label'  => 'Region',
                        'value'  => function ($model) {
                            return $model->fkIdRegion->nombre_region;
                        },
                    ],
                ],
            ]) ?>

        </div>
    </div>
</div>