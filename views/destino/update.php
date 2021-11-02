<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Destino */

$this->title = 'Update Destino: ' . $model->id_destino;
$this->params['breadcrumbs'][] = ['label' => 'Destinos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_destino, 'url' => ['view', 'id_destino' => $model->id_destino]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="destino-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
