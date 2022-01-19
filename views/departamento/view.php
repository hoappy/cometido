<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Departamento */

$this->title = 'Departamento: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Listado de Departamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="departamento-view">
    <div class="card card-info">
        <div class="card-header">
            <div>
                <p class="text-left">
                <h3 class="card-title"><b><?= Html::encode($this->title) ?></b></h3>
                </p>
                <p class="text-right">
                    <?= Html::a('Actualizar', ['update', 'id' => $model->id_departamento], ['class' => 'btn btn-secondary']) ?>
                    <?= Html::a('Eliminar', ['delete', 'id' => $model->id_departamento], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => '¿Estás segura de que quieres eliminar este artículo??',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>
            </div>
        </div>
        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id_departamento',
                    'nombre',
                    'cant_funcionarios',
                    'piso',
                    'estado',
                ],
            ]) ?>

        </div>
    </div>
</div>