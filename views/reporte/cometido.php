<?php

use yii\grid\GridView;
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
    <div class="col-md">
        <?= $chartGoogleSuma ?>
    </div>
    <div class="col-md">
        <?= $chartGoogleCant ?>
    </div>
</div>
<div class="row">
    <div class="col-md">
        <?php if ($model != null) {
            echo GridView::widget([
                'dataProvider' => $model,
                'columns' => [
                    //['class' => 'yii\grid\SerialColumn'],

                    [
                        'label' => 'Mes',
                        'value' =>

                        function ($model) {
                            if ($model['mes'] == '1') {
                                return 'Enero';
                            };
                            if ($model['mes'] == '2') {
                                return 'Febrero';
                            };
                            if ($model['mes'] == '3') {
                                return 'Marzo';
                            };
                            if ($model['mes'] == '4') {
                                return 'Abril';
                            };
                            if ($model['mes'] == '5') {
                                return 'Mayo';
                            };
                            if ($model['mes'] == '6') {
                                return 'Junio';
                            };
                            if ($model['mes'] == '7') {
                                return 'Julio';
                            };
                            if ($model['mes'] == '8') {
                                return 'Agosto';
                            };
                            if ($model['mes'] == '9') {
                                return 'Septiembre';
                            };
                            if ($model['mes'] == '10') {
                                return 'Octubre';
                            };
                            if ($model['mes'] == '11') {
                                return 'Noviembre';
                            };
                            if ($model['mes'] == '12') {
                                return 'Diciembre';
                            };

                            return 'ERROR';
                        }


                    ],
                    'Cantidad',
                    'Total',

                ],
            ]);
        } ?>
    </div>
</div>