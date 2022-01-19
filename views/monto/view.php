<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Monto */

$this->title = $model->fkIdItem->nombre_item . ' ' . $model->grado;
$this->params['breadcrumbs'][] = ['label' => 'Listado Montos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="monto-view">

    <div class="card card-info">
        <div class="card-header">
            <div>
                <p class="text-left">
                <h3 class="card-title"><b><?= Html::encode($this->title) ?></b></h3>
                </p>
                <p class="text-right">
                    <?= Html::a('Actualizar', ['update', 'id' => $model->id_monto], ['class' => 'btn btn-secondary']) ?>
                    <?= Html::a('Eliminar', ['delete', 'id' => $model->id_monto], [
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
                    //'id_monto',
                    'monto_sin_pernoctar',
                    'monto_con_pernoctar',
                    'grado',
                    'estado',
                    [
                        'label'  => 'Item Presupuestario',
                        'value'  => function ($model) {
                            return $model->fkIdItem->nombre_item;
                        },
                    ],
                ],
            ]) ?>

        </div>
    </div>
</div>