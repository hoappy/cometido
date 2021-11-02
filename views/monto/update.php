<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Monto */

$this->title = 'Update Monto: ' . $model->id_monto;
$this->params['breadcrumbs'][] = ['label' => 'Montos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_monto, 'url' => ['view', 'id_monto' => $model->id_monto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="monto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
