<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cometido */

$this->title = 'Create Cometido';
$this->params['breadcrumbs'][] = ['label' => 'Cometidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cometido-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
