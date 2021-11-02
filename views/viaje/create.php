<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Viaje */

$this->title = 'Create Viaje';
$this->params['breadcrumbs'][] = ['label' => 'Viajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="viaje-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
