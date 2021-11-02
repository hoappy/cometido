<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ItemPresupuestario */

$this->title = 'Update Item Presupuestario: ' . $model->id_item;
$this->params['breadcrumbs'][] = ['label' => 'Item Presupuestarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_item, 'url' => ['view', 'id_item' => $model->id_item]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="item-presupuestario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
