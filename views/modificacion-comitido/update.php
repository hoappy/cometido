<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ModificacionComitido */

$this->title = 'Update Modificacion Comitido: ' . $model->id_modificacion;
$this->params['breadcrumbs'][] = ['label' => 'Modificacion Comitidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_modificacion, 'url' => ['view', 'id_modificacion' => $model->id_modificacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="modificacion-comitido-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
