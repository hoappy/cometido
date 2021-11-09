<?php
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


    <!--<div class="form-group">
        <?php //$form->field($model, "username")->input("text") ?>
    </div>-->
<!---------------------------------------------------------------------------->
    <div class="form-group">
        <?= $form->field($model, 'nombre')->textarea(['rows' => 1]) ?>

        <?= $form->field($model, 'rut')->textInput(['maxlength' => 9]) ?>
    </div>
<!---------------------------------------------------------------------------->
    <div class="form-group">
        <?= $form->field($model, "email")->input("email") ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, "password")->input("password") ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, "password_repeat")->input("password") ?>
    </div>

<?= Html::submitButton("Registrar", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>