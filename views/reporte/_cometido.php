<?php

use app\models\Users;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<h1>Reporte de cometidos por rago de fechas y estado de un funcionario</h1>

<div class="form-row">
    <div class="col-md">
        <p>Desde: <?= $fecha->inicio ?></p>
    </div>
    <div class="col-md">
        <p>Hasta: <?= $fecha->fin ?></p>
    </div>
    <div class="col-md">
        <p>Funcionario: <?= $user->nombre . ' ' . $user->rut . '-' . Users::dv($user->rut) ?></p>
    </div>
    <div class="col-md">
        <p>Estado del Cometido:
            <?php
            if ($fecha->estado == '0') {
                echo 'Enviado por el Funcionario';
            };
            if ($fecha->estado == '1') {
                echo 'Aceptado por el Jefe Departamento';
            };
            if ($fecha->estado == '2') {
                echo 'Autorizado por el Director';
            };
            if ($fecha->estado == '3') {
                echo 'Vehiculo Pendiente de Asignacion';
            };
            if ($fecha->estado == '4') {
                echo 'Vehiculo Asignado';
            };
            if ($fecha->estado == '5') {
                echo 'En Cometido';
            };
            if ($fecha->estado == '6') {
                echo 'Cometido Finalizado';
            };
            if ($fecha->estado == '7') {
                echo 'Rechazado por Jefe Departamento';
            };
            if ($fecha->estado == '8') {
                echo 'Denegado por Director';
            };
            if ($fecha->estado == '9') {
                echo 'Cancelado por el Usuario';
            };
            if ($fecha->estado == '10') {
                echo 'Cancelado por Falta de Vehiculos';
            }; ?></p>
    </div>
</div>

<div class="row">
    <div class="col-md">
        <?= $chartGoogleCantidad ?>
    </div>
    <div class="col-md">
        <?php if ($model != null) {
            echo GridView::widget([
                'dataProvider' => $model,
                'columns' => [
                    //['class' => 'yii\grid\SerialColumn'],

                    [
                        'label' => 'Mes',
                        'value' =>

                        function ($model) {
                            if ($model['mes'] == '1') {
                                return 'Enero';
                            };
                            if ($model['mes'] == '2') {
                                return 'Febrero';
                            };
                            if ($model['mes'] == '3') {
                                return 'Marzo';
                            };
                            if ($model['mes'] == '4') {
                                return 'Abril';
                            };
                            if ($model['mes'] == '5') {
                                return 'Mayo';
                            };
                            if ($model['mes'] == '6') {
                                return 'Junio';
                            };
                            if ($model['mes'] == '7') {
                                return 'Julio';
                            };
                            if ($model['mes'] == '8') {
                                return 'Agosto';
                            };
                            if ($model['mes'] == '9') {
                                return 'Septiembre';
                            };
                            if ($model['mes'] == '10') {
                                return 'Octubre';
                            };
                            if ($model['mes'] == '11') {
                                return 'Noviembre';
                            };
                            if ($model['mes'] == '12') {
                                return 'Diciembre';
                            };

                            return 'ERROR';
                        }


                    ],
                    'cantidad',
                ],
            ]);
        } ?>
    </div>
</div>