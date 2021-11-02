<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Provincia */

$this->title = 'Update Provincia: ' . $model->id_provincia;
$this->params['breadcrumbs'][] = ['label' => 'Provincias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_provincia, 'url' => ['view', 'id_provincia' => $model->id_provincia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="provincia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
