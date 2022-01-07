<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Viaje */

$this->title = 'Asignar Vehiculo/Chofer';
$this->params['breadcrumbs'][] = ['label' => 'Viajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="viaje-create">

    <h1><?php Html::encode($this->title) ?></h1>

    <?= $this->render('_formAsigna', [
        'model' => $model,
        'users' => $users,
        'movils' => $movils,
    ]) ?>

</div>
