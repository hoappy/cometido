<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>


<div class="form-row justify-content-center">
    <div class="card-header text-center">
        <br>
        <img src="images/logo.jpg" class="brand-image elevation-3" style="opacity: .8">
        <div class="card-body ">

            <p>Por favor llene los siguientes campos para iniciar sesión:</p>

            <div class="card px-5 py-5">
                <br>
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'layout' => 'horizontal',

                ]); ?>


                <div class="col-md">
                    <?= $form->field($model, 'rut')->textInput(['autofocus' => true]) ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                </div>


                <br>
                <div class="row">
                    <div class="col-md text-center">
                        <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    </div>
                    <div class="col-md text-center">
                        <?= Html::submitButton('Iniciar Sesion', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                    <div class="col-md text-center">
                        <?php echo Html::a('<i >Recuperar Contraseña</i>', ['/site/recoverpass'], ['data-method' => 'post', 'class' => 'nav-link']); ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>