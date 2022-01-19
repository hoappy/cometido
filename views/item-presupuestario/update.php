<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ItemPresupuestario */

$this->title = 'Actualizar Item Presupuestario: ' . $model->nombre_item;
$this->params['breadcrumbs'][] = ['label' => 'Listado de Item Presupuestarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre_item, 'url' => ['view', 'id' => $model->id_item]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="item-presupuestario-update">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>