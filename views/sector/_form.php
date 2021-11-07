<?php

use app\models\Ciudad;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sector */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sector-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'fk_id_ciudad')->textInput() ?>

    <div class="form-row">
        <div class="col-md">
        <?= $form->field($model, 'nombre_sector')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md">
        <?= $form->field($model, 'fk_id_ciudad')
                ->dropDownList(
                    ArrayHelper::map(
                        Ciudad::find()->all(), 
                        'id_ciudad',
                        function ($query) {
                            return $query['nombre_ciudad'];
                        }
                    ),
                    ['prompt' => 'Seleccione una Provincia']
                ) ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
