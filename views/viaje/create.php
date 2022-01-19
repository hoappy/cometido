<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Viaje */

$this->title = 'Asignar Vehiculo / Chofer';
$this->params['breadcrumbs'][] = ['label' => 'Listado Asignacion', 'url' => ['cometidos4']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="viaje-create">

    <div class="card card-info">
        <div class="card-header">
            <div>
                <p>
                <h3 class="card-title"><b><?= Html::encode($this->title) ?></b></h3>
                </p>
            </div>
        </div>
        <div class="card-body">

            <?= $this->render('_formAsigna', [
                'model' => $model,
                'users' => $users,
                'movils' => $movils,
            ]) ?>

        </div>
    </div>
</div>