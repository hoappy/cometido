<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Viaje */

$this->title = 'Terminar Viaje: ' . $model->id_viaje;

?>
<div class="viaje-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formLlegada', [
        'model' => $model,
    ]) ?>

</div>
