<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <p>
        <?= Html::a('Crear Usuario', ['site/register'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nombre',
            'email:email',
            'rut',
            'estado',
            //'grado',
            //'tipo_funcionario',
            //'role',
            //'password',
            //'authKey',
            //'accessToken',
            //'activate',
            //'fk_id_departamento',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
