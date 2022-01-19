<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Departamento */

$this->title = 'Agregar Departamento';
$this->params['breadcrumbs'][] = ['label' => 'Listado de Departamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departamento-create">
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