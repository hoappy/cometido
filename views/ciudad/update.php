<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ciudad */

$this->title = 'Update Ciudad: ' . $model->id_ciudad;
$this->params['breadcrumbs'][] = ['label' => 'Listado de Ciudades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Ciudad: '.$model->nombre_ciudad, 'url' => ['view', 'id' => $model->id_ciudad]];
//$this->params['breadcrumbs'][] = ['label' => 'Provincia: '. $model->fkIdProvincia->nombre_provincia, 'url' => ['provincia/view', 'id' => $model->fk_id_provincia]];
//$this->params['breadcrumbs'][] = ['label' => 'Region: '.$model->fkIdProvincia->fkIdRegion->nombre_region, 'url' => ['region/view', 'id' => $model->fkIdProvincia->fk_id_region]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="ciudad-update">
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