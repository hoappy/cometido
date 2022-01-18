<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ciudad */

$this->title = $model->nombre_ciudad;
$this->params['breadcrumbs'][] = ['label' => 'Listado de Ciudades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ciudad-view">
    <div class="ciudad-update">
        <div class="card card-info">
            <div class="card-header">
                <div>
                    <p class="text-left">
                    <h3 class="card-title"><b><?= Html::encode($this->title) ?></b></h3>
                    </p>
                    <p class="text-right">
                    <?= Html::a('Actualizar', ['update', 'id' => $model->id_ciudad], ['class' => 'btn btn-secondary']) ?>
                    <?= Html::a('Eliminar', ['delete', 'id' => $model->id_ciudad], [
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

        </div>
    </div>
</div>