<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Viaje */

$this->title = 'Update Viaje: ' . $model->id_viaje;
$this->params['breadcrumbs'][] = ['label' => 'Viajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_viaje, 'url' => ['view', 'id_viaje' => $model->id_viaje]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="viaje-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
