<?php

use app\models\Region;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Provincia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="provincia-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-row">
        <div class="col-md">
        <?= $form->field($model, 'nombre_provincia')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md">
        <?= $form->field($model, 'fk_id_region')
                ->dropDownList(
                    ArrayHelper::map(
                        Region::find()->all(), 
                        'id_region',
                        function ($query) {
                            return $query['nombre_region'];
                        }
                    ),
                    ['prompt' => 'Seleccione una Region']
                ) ?>
        </div>
    </div>

    <?php // $form->field($model, 'nombre_provincia')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'fk_id_region')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
