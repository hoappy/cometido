<?php

use app\models\Vehiculo;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Viaje */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="viaje-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hora_salida')->textInput(['type' => 'time']) ?>

    <?= $form->field($model, 'hora_llegada')->textInput(['type' => 'time']) ?>

    <?= $form->field($model, 'combustible_litros')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'combustible_pesos')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'kilometros_salida')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'kilometros_llegada')->textInput(['type' => 'number']) ?>

    <?php // se calcula autmaticante como (kilometros_llegada - kilometros_salida)
    //lo siguiente se calculara en el controlador una vez ingresado todos los datos
    //$model->kilometros_total = ($model->kilometros_llegada-$model->kilometros_salida);
    echo $form->field($model, 'kilometros_total')->textInput(['type' => 'number', 'readonly' => true]) ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <?php //las obserbaciones se ingresaran junto a hora llegada y kilometros de llegada
    $form->field($model, 'observaciones')->textInput(['maxlength' => true]) ?>

    <?php //aqui el chofer tendra que seleccionar el vehiculo a ocupar en el cometi
    echo  $form->field($model, 'fk_id_vehiculo')
        ->dropDownList(
            ArrayHelper::map(
                Vehiculo::find()->all(),
                'id_vehiculo',
                function ($query) {
                    return $query['marca'] . ' ' . $query['modelo'] . ' ' . $query['patente'];
                }
            ),
            ['prompt' => 'Seleccione un Vehiculo']
        ) ?>
</div>

<?php //esta variable pasa por get o post ya que ellos tendran un listos de los cometidos el cual seleccionaran
// $form->field($model, 'fk_id_cometido')->textInput() 
?>

<?php //aqui obtenemos al chofer de la sesion ya q se tendra q loguear para ingresar los datos
// $form->field($model, 'fk_id')->textInput() 
?>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>