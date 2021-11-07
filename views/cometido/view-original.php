<?php

use app\models\ItemPresupuestario;
use app\models\Users;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cometido */

$this->title = $model->id_cometido;
$this->params['breadcrumbs'][] = ['label' => 'Cometidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cometido-view">

    <h1>Solicitud de Cometido Numero: <?= Html::encode($this->title) ?></h1>

    <p>
        <?php /* Html::a('Update', ['update', 'id' => $model->id_cometido], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_cometido], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])*/ ?>
    </p>
    <h2>Datos Personales</h2>
    <?= DetailView::widget([
        'model' => $funcionario,
        'attributes' => [
            //'id',
            'nombre',
            //'mail',
            'rut',
            //agregar digito verificador
            //'estado',
            'grado',
            'tipo_funcionario',
            //'role',
            //'fk_id_departamento',
        ],
    ]) ?>
    <?= DetailView::widget([
        'model' => $departamento,
        'attributes' => [
            //'id_departamento',
            'nombre',
            //'cant_funcionarios',
            'piso',
            //'estado',
        ],
    ]) ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_cometido',
            //'con_viatico',
            [
                'label' => 'Corresponde Viatico?',
                'value' => 
                
                function ($model) {
                    if($model->con_viatico == '0'){
                        return 'NO';
                    }else{
                        return 'SI';
                    }
                }
                

            ],
            'dias_sin_pernoctar',
            'dias_con_pernoctar',
            'monto',
            'fecha_inicio',
            'fecha_fin',
            'hora_inicio',
            'hora_fin',
            'motivo_cometido',
            'tranporte_ida',
            'transporte_regreso',
            'estado',
            'descreipcion',
            //'fk_id_item',
            [
                'label' => 'Item Presupuestario',
                'value' => 
                
                function ($model) {
                    $item = ItemPresupuestario::findOne($model->fk_id_item);
                    return $item->nombre_item .' - '. $item->porcentaje .'%';
                }
                

            ],
            [
                'label' => 'Autorizado Por:',
                'value' => 
                
                function ($model) {
                    $director = Users::findOne($model->fk_id_director);
                    if ($director == null){
                        return '';
                    }else{
                        return $director->nombre .' - '. $director->rut;
                    }
                }
                

            ],
            //'fk_id',
            
            //'fk_id_director',

            
        ],
    ]) ?>

</div>
