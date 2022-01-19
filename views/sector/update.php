<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sector */

$this->title = 'Actualizar Sector: ' . $model->nombre_sector;
$this->params['breadcrumbs'][] = ['label' => 'Listado de Sectores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre_sector, 'url' => ['view', 'id' => $model->id_sector]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="sector-update">
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