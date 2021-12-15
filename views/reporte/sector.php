<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(); ?>

<h1>Reporte de los 10 Sectores mas visitados en cierto rango de fechas</h1>

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
    <div class="col-md">
        <?= $chartGoogleCant ?>
    </div>
    <div class="col-md">
        <?php if ($model != null) {
            echo GridView::widget([
                'dataProvider' => $model,
                'columns' => [
                    //['class' => 'yii\grid\SerialColumn'],
                    'sector',
                    'cantidad',

                ],
            ]);
        } ?>
    </div>

</div>