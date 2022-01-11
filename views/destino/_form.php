<?php

use app\models\Ciudad;
use app\models\Provincia;
use app\models\Region;
use app\models\Sector;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Destino */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="destino-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'fk_id_region')
        ->dropDownList(
            ArrayHelper::map(
                Region::find()->all(),
                'id_region',
                function ($query) {
                    return $query['nombre_region'] . ' - ' . $query['numero_region'];
                }
            ),
            ['prompt' => 'Seleccione una Region',
            'onchange' =>
                            '$.get( "' . Url::toRoute('/provincia/list') . '", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#' . Html::getInputId($model, 'fk_id_provincia') . '" ).html( data );
                            });'
            ]
        ) ?>
    <?= $form->field($model, 'fk_id_provincia')
        ->dropDownList(
            ArrayHelper::map(
                Provincia::find()->all(),
                'id_provincia',
                function ($query) {
                    return $query['nombre_provincia'];
                }
            ),
            ['prompt' => 'Seleccione una Provincia',
            'onchange' =>
                            '$.get( "' . Url::toRoute('/ciudad/list') . '", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#' . Html::getInputId($model, 'fk_id_ciudad') . '" ).html( data );
                            });'
            ]
        ) ?>
    <?= $form->field($model, 'fk_id_ciudad')
        ->dropDownList(
            ArrayHelper::map(
                Ciudad::find()->all(),
                'id_ciudad',
                function ($query) {
                    return $query['nombre_ciudad'];
                }
            ),
            ['prompt' => 'Seleccione una Ciudad',
            'onchange' =>
                            '$.get( "' . Url::toRoute('/sector/list') . '", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#' . Html::getInputId($model, 'fk_id_sector') . '" ).html( data );
                            });'
        ]
        ) ?>

    <?= $form->field($model, 'fk_id_sector')
        ->dropDownList(
            ArrayHelper::map(
                Sector::find()->all(),
                'id_sector',
                function ($query) {
                    return $query['nombre_sector'];
                }
            ),
            ['prompt' => 'Seleccione un Sector']
        ) ?>

    <div class="form-group">
        <?= Html::submitButton('Agregar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Finalizar', ['cometido/view', 'id' => $model->fk_id_cometido], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>