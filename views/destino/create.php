<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Destino */

/*$this->title = 'Create Destino';
$this->params['breadcrumbs'][] = ['label' => 'Destinos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="destino-create">
    <?= $msg ?>
    <h1><?= $_GET['msg'] ?></h1>
    <div class="card card-info">
        <div class="card-header">
            <div>
                <h5 class="card-title"><b>Agregar Destino</b></h5>
            </div>
        </div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

    <div class="card card-info">
        <div class="card-header">
            <div>
                <h5 class="card-title"><b>Destinos ya Agregados</b></h5>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md">

                    <?= GridView::widget([
                        'dataProvider' => $destinos,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'nombre_region',
                            'numero_region',
                            'nombre_provincia',
                            'nombre_ciudad',
                            'nombre_sector',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{link}',
                                'buttons' => [
                                    'link' => function ($url, $destinos, $key) {
                                        return Html::a('<a class="btn btn-danger" href="index.php?r=destino/delete&id=' . $destinos['id_destino'] . '">Eliminar</a>');
                                    },
                                ],
                            ]

                        ],
                    ]); ?>

                </div>
            </div>
        </div>
    </div>
</div>