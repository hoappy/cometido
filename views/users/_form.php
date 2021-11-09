<?php

use app\models\Departamento;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<!--div class="users-form"-->

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-row">
        <div class="col-md">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md">
            <?= $form->field($model, 'rut')->textInput(['type' => 'number'])->hint('Ejemplo: 11222333 (sin puntos ni digito vereficador)') ?>
        </div>
    </div>

    <?= $form->field($model, 'mail')->textInput(['maxlength' => true], ['type' => 'mail']) ?>

    <div class="row">
        <div class="col-md">
            <?= $form->field($model, 'grado')->textInput() ?>
        </div>
        <div class="col-md">
            <?php
            echo $form->field($model, 'tipo_funcionario')->dropDownList(
                [
                    '0' => 'Planta',
                    '1' => 'Contrata',
                    '2' => 'Honorarios'
                ],
                ['prompt' => 'Seleccion Tipo de Funcionario']
            );
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md">
            <?php
            echo $form->field($model, 'role')->dropDownList(
                [
                    '0' => 'Funcionario',
                    '1' => 'Encargado de Vehiculo',
                    '2' => 'Chofer',
                    '3' => 'Jefe Suplente',
                    '4' => 'Jefe Departamento',
                    '5' => 'Director Suplente',
                    '6' => 'Director',
                    '7' => 'Administrador'
                ],
                ['prompt' => 'Seleccion nivel de Usuario']
            );
            ?>
        </div>
        <div class="col-md">
            <?= $form->field($model, 'fk_id_departamento')
                ->dropDownList(
                    ArrayHelper::map(
                        Departamento::find()->all(),
                        'id_departamento',
                        function ($query) {
                            return $query['nombre'];
                        }
                    ),
                    ['prompt' => 'Seleccione un Departamento']
                ) ?>
        </div>
    </div>

    <?php // $form->field($model, 'estado')->textInput() 
    ?>



    <?php // $form->field($model, 'tipo_funcionario')->textInput() 
    ?>


    <?php // $form->field($model, 'role')->textInput() 
    ?>


    <?php // $form->field($model, 'fk_id_departamento')->textInput() 
    ?>


    <div class="form-group">


        <div class="form-group">
            <?= Html::submitButton('Agregar Usuario', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>