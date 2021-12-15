<?php

use app\models\Users;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Viaje */

?>
<div class="viaje-update">

    <h1>Ingresar Monto del Viatico</h1>

    <?= $this->render('_formMonto', [
        'model' => $model,
    ]) ?>

    <h4>Datos Del Funcionario</h4>
    <hr>
    <div class="row">
        <div class="col-md">
            <h5>Nombre: <?= $funcionario->nombre ?></h5>

        </div>
        <div class="col-md">
            <h5>Rut: <?= $funcionario->rut ?> - <?= Users::dv($funcionario->rut) ?></h5>
        </div>
        <div class="col-md">
            <h5>Grado: <?= $funcionario->grado ?></h5>
        </div>
        <div class="col-md">
            <h5>Departamento: <?= $departamento->nombre ?></h5>
        </div>

    </div>
    <br>

    <h4>Datos del Cometido</h4>
    <hr>
    <div class="row">
        <div class="col-md">
            <h5><strong>Motivo del Cometido: <?= $cometido->motivo_cometido ?></strong></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <h5>Fecha Inicio: <?= $cometido->fecha_inicio ?></h5>
            <h5>Hora Inicio: <?= $cometido->hora_inicio ?></h5>
        </div>
        <div class="col-md">
            <h5>Fecha Regreso: <?= $cometido->fecha_fin ?></h5>
            <h5>Hora Regreso: <?= $cometido->hora_fin ?></h5>
        </div>
        <div class="col-md">
            <h5>Dias con pernoctar: <?= $cometido->dias_con_pernoctar ?></h5>
            <h5>Dias sin pernoctar: <?= $cometido->dias_sin_pernoctar ?></h5>
            <h5>Con Viatico:
                <?php if ($cometido->con_viatico == '1') {
                    echo 'SI';
                } else {
                    echo 'NO';
                } ?></h5>
        </div>
        <div class="col-md">
            <h5>Tipo Transporte IDA:
                <?php
                if ($cometido->tranporte_ida == '0') {
                    echo 'Vehiculo SERVIU';
                };
                if ($cometido->tranporte_ida == '1') {
                    echo 'Locomocion Colectiva';
                };
                if ($cometido->tranporte_ida == '2') {
                    echo 'Bus Inter Urbano';
                };
                if ($cometido->tranporte_ida == '3') {
                    echo 'Taxi / Uber / Didi / Cabify';
                };
                if ($cometido->tranporte_ida == '4') {
                    echo 'Personal';
                }; ?></h5>
            <h5>Tipo Transporte REGRESO:
                <?php
                if ($cometido->transporte_regreso == '0') {
                    echo 'Vehiculo SERVIU';
                };
                if ($cometido->transporte_regreso == '1') {
                    echo 'Locomocion Colectiva';
                };
                if ($cometido->transporte_regreso == '2') {
                    echo 'Bus Inter Urbano';
                };
                if ($cometido->transporte_regreso == '3') {
                    echo 'Taxi / Uber / Didi / Cabify';
                };
                if ($cometido->transporte_regreso == '4') {
                    echo 'Personal';
                }; ?></h5>
        </div>
    </div>

    <div class="row">
        <div class="col-md">
            <h5>Item Presupuestario: <?= $item->nombre_item ?></h5>
        </div>
    </div>

</div>