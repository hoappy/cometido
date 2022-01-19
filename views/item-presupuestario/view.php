<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ItemPresupuestario */

$this->title = $model->nombre_item;
$this->params['breadcrumbs'][] = ['label' => 'Listado de Item Presupuestarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="item-presupuestario-view">
    <div class="card card-info">
        <div class="card-header">
            <div>
                <p class="text-left">
                <h3 class="card-title"><b><?= Html::encode($this->title) ?></b></h3>
                </p>
                <p class="text-right">
                    <?= Html::a('Actualizar', ['update', 'id' => $model->id_item], ['class' => 'btn btn-secondary']) ?>
                    <?= Html::a('Eliminar', ['delete', 'id' => $model->id_item], [
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
                    //'id_item',
                    'nombre_item',
                    'porcentaje',
                    //'estado',
                    'descripcion',
                ],
            ]) ?>

        </div>
    </div>
</div>