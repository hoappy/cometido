<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Viaje */

$this->title = 'Inicar Viaje: ' . $model->id_viaje;
$this->params['breadcrumbs'][] = ['label' => 'Listado de Viajes por Iniciar', 'url' => ['cometidos1']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="viaje-salida">
    <div class="card card-info">
        <div class="card-header">
            <div>
                <p>
                <h3 class="card-title"><b><?= Html::encode($this->title) ?></b></h3>
                </p>
            </div>
        </div>
        <div class="card-body">

            <?= $this->render('_formSalida', [
                'model' => $model,
            ]) ?>

        </div>
    </div>
</div>