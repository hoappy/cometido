<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cometido */
$this->params['breadcrumbs'][] = ['label' => 'Listado de mis Cometidos', 'url' => ['index1']];
$this->params['breadcrumbs'][] = $this->title = 'Crear Cometido';
?>
<div class="cometido-create">


    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>