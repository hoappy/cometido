<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Monto */

$this->title = $model->fkIdItem->nombre_item . ' ' . $model->grado;
$this->params['breadcrumbs'][] = ['label' => 'Listado Montos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $model->id_monto]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="monto-update">
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