<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Viaje */

$this->title = 'Salida Viaje: ' . $model->id_viaje;
$this->params['breadcrumbs'][] = ['label' => 'Viajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_viaje, 'url' => ['view', 'id_viaje' => $model->id_viaje]];
$this->params['breadcrumbs'][] = 'Salida';
?>
<div class="viaje-salida">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formSalida', [
        'model' => $model,
    ]) ?>

</div>
