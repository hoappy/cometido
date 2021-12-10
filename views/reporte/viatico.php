<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(); ?>

<h1>Reporte de los Viaticos Por rando de meses seleccionado</h1>

<div class="form-row">
    <div class="col-md">
        <?= $form->field($fecha, 'inicio')->textInput(['type' => 'date']) ?>
    </div>
    <div class="col-md">
        <?= $form->field($fecha, 'fin')->textInput(['type' => 'date']) ?>
    </div>
</div>

<div class="form-group">
    <?= Html::submitButton('Buscar', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>


<div class="row">

    <div class="col-sm-6">

        <div class="sale-chart">

            <?= $chartGoogleSuma ?>

        </div>

    </div>

    <div class="col-sm-6">

        <div class="book-chart">

            <?= $chartGoogleCant ?>

        </div>

    </div>

</div>
