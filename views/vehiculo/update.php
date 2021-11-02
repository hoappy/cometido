<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vehiculo */

$this->title = 'Update Vehiculo: ' . $model->id_vehiculo;
$this->params['breadcrumbs'][] = ['label' => 'Vehiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_vehiculo, 'url' => ['view', 'id_vehiculo' => $model->id_vehiculo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vehiculo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
