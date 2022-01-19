<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Provincia */

$this->title = 'Actualizar Provincia de: ' . $model->nombre_provincia;
$this->params['breadcrumbs'][] = ['label' => 'Listado de Provincias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre_provincia, 'url' => ['view', 'id' => $model->id_provincia]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="provincia-update">
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