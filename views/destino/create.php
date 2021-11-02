<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Destino */

$this->title = 'Create Destino';
$this->params['breadcrumbs'][] = ['label' => 'Destinos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="destino-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
