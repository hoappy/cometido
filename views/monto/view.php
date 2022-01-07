<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Monto */

$this->title = $model->fkIdItem->nombre_item . ' ' . $model->grado;
$this->params['breadcrumbs'][] = ['label' => 'Montos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="monto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_monto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_monto], [
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
