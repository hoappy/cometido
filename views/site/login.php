<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="col-8 text-center">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>Please fill out the following fields to login:</p>

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',

        ]); ?>


        <div class="col-md">
            <?= $form->field($model, 'rut')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
        </div>

        <div class="col-md">
            <?= $form->field($model, 'rememberMe')->checkbox() ?>
        </div>

        <div class="form-group">
            <div class="offset-lg-1 col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

        <div class="offset-lg-1" style="color:#999;">
        <div class="col-md">
            <?php echo Html::a('<i >Recuperar Contrasenia</i>', ['/site/recoverpass'], ['data-method' => 'post', 'class' => 'nav-link']); ?>
        </div>
        </div>
    </div>
</div>