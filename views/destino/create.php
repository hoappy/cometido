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

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $msg ?>
    <h1><?= $_GET['msg'] ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

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