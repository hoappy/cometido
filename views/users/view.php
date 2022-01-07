<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="users-view">

    <h1><?php Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'nombre',
            'email:email',
            'rut',
            //'estado',
            'grado',
            //'tipo_funcionario',
            [
                'label'  => 'Tipo Funcionario',
                'value'  => function ($model) {
                    switch ($model->tipo_funcionario) {
                        case 0:
                            return "Planta";
                            break;
                        case 1:
                            return "Contrata";
                            break;
                        case 2:
                            return "Honorarios";
                            break;
                    }
                },
            ],
            //'role',
            [
                'label'  => 'role',
                'value'  => function ($model) {
                    switch ($model->role) {
                        case 0:
                            return "Funcionario";
                            break;
                        case 1:
                            return "Encargado de Vehiculo";
                            break;
                        case 2:
                            return "Chofer";
                            break;
                        case 3:
                            return "Jefe Suplente";
                            break;
                        case 4:
                            return "Jefe Departamento";
                            break;
                        case 5:
                            return "Director Suplente";
                            break;
                        case 6:
                            return "Director";
                            break;
                        case 7:
                            return "Administrador";
                            break;
                        case 8:
                            return "Super Administrador";
                            break;
                    }
                    return 'error';
                },
            ],
            //'password',
            //'authKey',
            //'accessToken',
            //'activate',
            [
                'label'  => 'role',
                'value'  => function ($model) {
                    return $model->fkIdDepartamento->nombre;
                },
            ],
        ],
    ]) ?>

</div>
