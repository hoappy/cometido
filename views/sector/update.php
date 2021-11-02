<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sector */

$this->title = 'Update Sector: ' . $model->id_sector;
$this->params['breadcrumbs'][] = ['label' => 'Sectors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sector, 'url' => ['view', 'id_sector' => $model->id_sector]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sector-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
