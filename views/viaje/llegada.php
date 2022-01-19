<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Viaje */

$this->title = 'Terminar Viaje: ' . $model->id_viaje;
$this->params['breadcrumbs'][] = ['label' => 'Listado de Viajes por Terminar', 'url' => ['cometidos2']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="viaje-update">

    <div class="card card-info">
        <div class="card-header">
            <div>
                <p>
                <h3 class="card-title"><b><?= Html::encode($this->title) ?></b></h3>
                </p>
            </div>
        </div>
        <div class="card-body">

            <?= $this->render('_formLlegada', [
                'model' => $model,
            ]) ?>

        </div>
    </div>
</div>