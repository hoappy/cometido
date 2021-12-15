<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Viaje */

$this->title = 'Inicar Viaje: ' . $model->id_viaje;

?>
<div class="viaje-salida">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formSalida', [
        'model' => $model,
    ]) ?>

</div>
