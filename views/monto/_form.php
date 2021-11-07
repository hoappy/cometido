<?php

use app\models\ItemPresupuestario;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Monto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="monto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'id_monto')->textInput() 
    ?>

    <?php // $form->field($model, 'monto_sin_pernoctar')->textInput() 
    ?>

    <?php // $form->field($model, 'monto_con_pernoctar')->textInput() 
    ?>

    <?php // $form->field($model, 'grado')->textInput() 
    ?>

    <?php // $form->field($model, 'estado')->textInput() 
    ?>

    <?php // $form->field($model, 'fk_id_item')->textInput() 
    ?>

    <div class="form-row">
        <div class="col-md">
            <?= $form->field($model, 'monto_con_pernoctar')->textInput(['type' => 'number'])->hint('Ingrese el Monto correspondiente') ?>
        </div>
        <div class="col-md">
            <?= $form->field($model, 'monto_sin_pernoctar')->textInput(['type' => 'number'])->hint('Ingrese el Monto correspondiente') ?>
        </div>

    </div>
    <div class="form-row">
        <div class="col-md">
            <?= $form->field($model, 'grado')->textInput() ?>
        </div>
        <div class="col-md">
            <?= $form->field($model, 'fk_id_item')
                ->dropDownList(
                    ArrayHelper::map(
                        ItemPresupuestario::find()->all(),
                        'id_item',
                        function ($query) {
                            return $query['nombre_item'];
                        }
                    ),
                    ['prompt' => 'Seleccione un Item Presupuestario']
                ) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>