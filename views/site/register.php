<?php

use app\models\Departamento;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h3><?= $msg ?></h3>

<h1>Registro de Usuarios</h1>
<?php $form = ActiveForm::begin([
    'method' => 'post',
    'id' => 'formulario',
    'enableClientValidation' => true,
    'enableAjaxValidation' => false,
]);
?>


<!---------------------------------------------------------------------------->
<div class="form-row">
    <div class="col-md">
        <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md">
        <?= $form->field($model, 'rut')->textInput(['type' => 'number'])->hint('Ejemplo: 11222333 (sin puntos ni digito vereficador)') ?>
    </div>
</div>

<?= $form->field($model, 'email')->textInput(['maxlength' => true], ['type' => 'mail']) ?>

<div class="row">
    <div class="col-md">
        <?php
        echo $form->field($model, 'grado')->dropDownList(
            [
                '0' => 'Grado 1',
                '1' => 'Grado 2',
                '2' => 'Grado 3',
                '3' => 'Grado 4',
                '4' => 'Grado 5',
                '5' => 'Grado 6',
                '6' => 'Grado 7',
                '7' => 'Grado 8',
                '8' => 'Grado 9',
                '9' => 'Grado 10',
                '10' => 'Grado 11',
                '11' => 'Grado 12',
                '12' => 'Grado 13',
                '13' => 'Grado 14',
                '14' => 'Grado 15',
                '15' => 'Grado 16',
                '16' => 'Grado 17',
                '17' => 'Grado 18',
                '18' => 'Grado 19',
                '19' => 'Grado 20',
                '20' => 'Grado 21',
                '21' => 'Grado 22',
                '22' => 'Grado 23',
                '23' => 'Grado 24',
                '24' => 'Grado 25'

            ],
            ['prompt' => 'Seleccion un Grado']
        );
        ?>
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
                '7' => 'Administrador',
                //'8' => 'Supoer Administrador'
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
<!---------------------------------------------------------------------------->

<div class="row">
    <div class="col-md">
        <?php
        echo $form->field($model, "password")->input("password")
        ?>
    </div>
    <div class="col-md">
        <?php
        echo $form->field($model, "password_repeat")->input("password")
        ?>
    </div>
</div>


<?= Html::submitButton("Registrar", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>