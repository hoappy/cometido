<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cometido */

$this->title = 'Update Cometido: ' . $model->id_cometido;
$this->params['breadcrumbs'][] = ['label' => 'Cometidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cometido, 'url' => ['view', 'id_cometido' => $model->id_cometido]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cometido-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
