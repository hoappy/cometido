<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sector */

$this->title = 'Create Sector';
$this->params['breadcrumbs'][] = ['label' => 'Sectors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sector-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
