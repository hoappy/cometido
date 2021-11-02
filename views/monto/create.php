<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Monto */

$this->title = 'Create Monto';
$this->params['breadcrumbs'][] = ['label' => 'Montos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
