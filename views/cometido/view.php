<?php

use app\models\Users;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Cometido */

$this->title = 'Solicitud de Cometido Numero: ' . $cometido->id_cometido;
$this->params['breadcrumbs'][] = ['label' => 'Cometidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cometido-view">

    <h1 class='text-center'>Solicitud de Cometido Numero: <?= ' ' . $cometido->id_cometido ?></h1>
    <br>
    <br>
    <br>
    <h4>Datos Personales</h4>
    <hr>
    <div class="row">
        <div class="col-md">
            <h5>Nombre: <?= $funcionario->nombre ?></h5>

        </div>
        <div class="col-md">
            <h5>Rut: <?= $funcionario->rut ?> - <?= Users::dv($funcionario->rut) ?></h5>
        </div>
        <div class="col-md">
            <h5>Jefe Directo:
                <?php
                if ($jefe != null) {
                    echo $jefe->nombre;
                };
                ?></h5>
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
    <div class="row">
        <div class="col-md">
            <h5>Estado del Cometido:
                <?php
                if ($cometido->estado == '0') {
                    echo 'Enviado por el Funcionario';
                };
                if ($cometido->estado == '1') {
                    echo 'Aceptado por el Jefe Departamento';
                };
                if ($cometido->estado == '2') {
                    echo 'Autorizado por el Director';
                };
                if ($cometido->estado == '3') {
                    echo 'Vehiculo Pendiente de Asignacion';
                };
                if ($cometido->estado == '4') {
                    echo 'Vehiculo Asignado';
                };
                if ($cometido->estado == '5') {
                    echo 'En Cometido';
                };
                if ($cometido->estado == '6') {
                    echo 'Cometido Finalizado';
                };
                if ($cometido->estado == '7') {
                    echo 'Rechazado por Jefe Departamento';
                };
                if ($cometido->estado == '8') {
                    echo 'Denegado por Director';
                };
                if ($cometido->estado == '9') {
                    echo 'Cancelado por el Usuario';
                };
                if ($cometido->estado == '10') {
                    echo 'Cancelado por Falta de Vehiculos';
                }; ?></h5>
        </div>
    </div>
    <br>

    <h4>Destinos del Cometido</h4>
    <hr>
    <div class="row">
        <div class="col-md">
            <h5>Este apartado quedara pendiente cuando se implemente el crud de destino: </h5>

            <?= GridView::widget([
                'dataProvider' => $destinos,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

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
    <br>
    <br>
    <br>
    <div class="row text-center">
        <div class="col-md">
            <h5>Firma Jefe Director</h5>
            <?php
            if ($jefe != null) {
                echo $jefe->nombre;
            };
            ?>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="col-md">
            <h5>Firma Funcionario</h5>
            <?= $funcionario->nombre ?>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="row text-center">
        <div class="col-md">
            <h5>Firma Jefe Director</h5>
            <?php
            if ($director != null) {
                echo $director->nombre;
            };
            ?>
        </div>
    </div>
    <br>
    <br>
    <br>


</div>