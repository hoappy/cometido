<?php

use app\models\Provincia;
use app\models\Region;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ciudad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ciudad-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-row">
        <div class="col-md">
            <?= $form->field($model, 'nombre_ciudad')->textInput(['maxlength' => true]) ?>
        </div>
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
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>