<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ItemPresupuestario */

$this->title = 'Create Item Presupuestario';
$this->params['breadcrumbs'][] = ['label' => 'Item Presupuestarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-presupuestario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
