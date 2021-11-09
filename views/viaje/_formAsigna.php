<?php

use app\models\Users;
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
    <?php //aqui el encargado vehiculo tendra que seleccionar el vehiculo 
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
    <?php //aqui el encargado vehiculo tendra que seleccionar el chofer 
    echo  $form->field($model, 'fk_id')//obtener estos valores por post ya que se tiene q hacer una consuklta sql elavorada
        ->dropDownList(
            ArrayHelper::map(
                Users::find(['role' => '2'])->all(),
                'id_vehiculo',
                function ($query) {
                    return $query['nombre'] . ' ' . $query['rut'] . ' - ' . Users::dv($query['rut']);
                }
            ),
            ['prompt' => 'Seleccione un Chofer']
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