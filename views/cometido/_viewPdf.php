<?php

use app\models\Users;
use yii\grid\GridView;

?>



<div class="container">

    <h1 class='text-center'>Solicitud de Cometido Numero: <?= ' ' . $cometido->id_cometido ?></h1>
    <h2>Datos Personales</h2>
    <hr>
    <div class="row">
        <div class="col-xs-2">
            <p>Nombre: <?= $funcionario->nombre ?></p>

        </div>
        <div class="col-xs-2">
            <p>Rut: <?= $funcionario->rut ?> - <?= Users::dv($funcionario->rut) ?></p>
        </div>
        <div class="col-xs-2">
            <p>Jefe Directo:
                <?php
                if ($jefe != null) {
                    echo $jefe->nombre;
                };
                ?></p>
        </div>
        <div class="col-xs-2">
            <p>Grado: <?= $funcionario->grado ?></p>
            <p>Departamento: <?= $departamento->nombre ?></p>
        </div>
    </div>

    <h2>Datos del Cometido</h2>
    <hr>
    <div class="row">
        <div class="col-xs-12">
            <strong>Motivo del Cometido: <?= $cometido->motivo_cometido ?></strong>
        </div>

        <div class="col-xs-3">
            <p>Fecha Inicio: <?= $cometido->fecha_inicio ?></p>
            <p>Hora Inicio: <?= $cometido->hora_inicio ?></p>
        </div>
        <div class="col-xs-3">
            <p>Fecha Regreso: <?= $cometido->fecha_fin ?></p>
            <p>Hora Regreso: <?= $cometido->hora_fin ?></p>
        </div>
        <div class="col-xs-3">
            <p>Dias con pernoctar: <?= $cometido->dias_con_pernoctar ?></p>
            <p>Dias sin pernoctar: <?= $cometido->dias_sin_pernoctar ?></p>
            <p>Con Viatico:
                <?php if ($cometido->con_viatico == '1') {
                    echo 'SI';
                } else {
                    echo 'NO';
                } ?></p>
        </div>
        <div class="col-xs-3">
            <p>Tipo Transporte IDA:
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
                }; ?></p>

        </div>
        <div class="col-xs-3">
            <p>Tipo Transporte REGRESO:
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
                }; ?></p>
        </div>
        <div class="col-xs-3">
            <p>Item Presupuestario: <?= $item->nombre_item ?></p>
        </div>
    </div>

    <h2>Destinos del Cometido</h2>
    <hr>
    <div class="row">
        <div col-xs-12>

            <?= GridView::widget([
                'dataProvider' => $destinos,
                'columns' => [
                    'nombre_region',
                    'numero_region',
                    'nombre_provincia',
                    'nombre_ciudad',
                    'nombre_sector',

                ],
            ]); ?>

        </div>
    </div>

    <br>
    <br>
    <div class="row text-left">
        <div class="col-xs-5 text-center">
            <p>Firma Jefe Departamento</p>
            <?php
            if ($jefe != null) {
                echo $jefe->nombre;
            };
            ?>
        </div>
        <div class="row text-right">
        </div>
        <div class="col-xs-5 text-center">
            <p>Firma Funcionario</p>
            <?= $funcionario->nombre ?>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="row text-center">
        <div class="col-xs-12">
            <p>Firma Jefe Director</p>
            <?php
            if ($director != null) {
                echo $director->nombre;
            };
            ?>
        </div>
    </div>


</div>