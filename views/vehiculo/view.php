<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Vehiculo */

$this->title = $model->marca . '  ' . $model->modelo .'  ' . $model->patente;
$this->params['breadcrumbs'][] = ['label' => 'Vehiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vehiculo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_vehiculo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_vehiculo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás segura de que quieres eliminar este artículo?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_vehiculo',
            'patente',
            'modelo',
            'marca',
            [
                'label' => 'Tipo de Combustible',
                'value' => 
                
                function ($model) {
                    if($model->tipo_combustible == '0'){
                        return '93';
                    };
                    if($model->tipo_combustible == '1'){
                        return '95';
                    };
                    if($model->tipo_combustible == '2'){
                        return '97';
                    };
                    if($model->tipo_combustible == '3'){
                        return 'Diesel';
                    };
                    return 'ERROR';
                }
                

            ] ,
            'num_chasis',
            'estado',
            'kilometraje',
            'rendimiento',
        ],
    ]) ?>

</div>
