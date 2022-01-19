<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Departamento */

$this->title = 'Actualizar Departamento: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Listado de Departamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id_departamento]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="departamento-update">
    <div class="card card-info">
        <div class="card-header">
            <div>
                <h1><?= Html::encode($this->title) ?></h1>
            </div>
        </div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>