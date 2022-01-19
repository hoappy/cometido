<?php

use app\models\Ciudad;
use app\models\Provincia;
use app\models\Region;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$form = ActiveForm::begin(); ?>
<div class="card card-info">
    <div class="card-header">
        <h1 class="card-title">Reporte de los 10 Sectores mas visitados por provincia</h1>
    </div>
    <div class="card-body">

        <div class="form-row">
            <div class="col-md">
                <?= $form->field($model, 'inicio')->textInput(['type' => 'date']) ?>
            </div>
            <div class="col-md">
                <?= $form->field($model, 'fin')->textInput(['type' => 'date']) ?>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md">
                <?= $form->field($model, 'fk_id_region')
                    ->dropDownList(
                        ArrayHelper::map(
                            Region::find()->all(),
                            'id_region',
                            function ($query) {
                                return $query['nombre_region'] . ' - ' . $query['numero_region'];
                            }
                        ),
                        [
                            'prompt' => 'Seleccione una Region',
                            'onchange' =>
                            '$.get( "' . Url::toRoute('/provincia/list') . '", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#' . Html::getInputId($model, 'fk_id_provincia') . '" ).html( data );
                            });'
                        ]
                    ) ?>
            </div>
            <div class="col-md">
                <?= $form->field($model, 'fk_id_provincia')
                    ->dropDownList(
                        ArrayHelper::map(
                            Provincia::find()->all(),
                            'id_provincia',
                            function ($query) {
                                return $query['nombre_provincia'];
                            }
                        ),
                        [
                            'prompt' => 'Seleccione una Provincia',
                        ]
                    ) ?>
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<div class="row">
    <div class="col-md">
        <div class="card card-info">
            <div class="card-body">
                <?= $chartGoogleCant ?>
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="card card-info">
            <div class="card-body">
                <?php if ($models != null) {
                    echo GridView::widget([
                        'dataProvider' => $models,
                        'columns' => [
                            //['class' => 'yii\grid\SerialColumn'],
                            'sector',
                            'cantidad',

                        ],
                    ]);
                } ?>
            </div>
        </div>
    </div>
</div>