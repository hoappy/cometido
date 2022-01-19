<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vehiculo */

$this->title = 'Actualizar Vehiculo: ' . $model->patente . ' - ' . $model->marca . ' - ' . $model->modelo;
$this->params['breadcrumbs'][] = ['label' => 'Listado de Vehiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->patente . ' - ' . $model->marca . ' - ' . $model->modelo, 'url' => ['view', 'id' => $model->id_vehiculo]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="vehiculo-update">
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