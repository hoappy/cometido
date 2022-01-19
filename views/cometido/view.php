<?php

use app\models\Users;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cometido */

$this->title = 'Solicitud de Cometido Numero: ' . $cometido->id_cometido;
//$this->params['breadcrumbs'][] = ['label' => 'Listado de mis Cometidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<div class="cometido-view">
    <div class="card card-info">
        <div class="card-header">
            <div>
                <h3 class="card-title"><b><?= Html::encode($this->title) ?></b></h3>
                <p class="text-right">
                    <?= Html::a('<a class="btn btn-secondary font-weight-bold" href="index.php?r=cometido/pdf&id=' . $cometido->id_cometido . '">Generar PDF</a>') ?>
                </p>
            </div>
        </div>
        <div class="card-body">
            <div class="card card">
                <div class="card-header">
                    <div>
                        <h3 class="card-title"><b>Datos Personales</b></h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md">
                            <h5><b>Nombre: </b><?= $funcionario->nombre ?></h5>

                        </div>
                        <div class="col-md">
                            <h5><b>Rut: </b><?= $funcionario->rut ?> - <?= Users::dv($funcionario->rut) ?></h5>
                        </div>
                        <div class="col-md">
                            <h5><b>Jefe Directo:</b>
                                <?php
                                if ($jefe != null) {
                                    echo $jefe->nombre;
                                };
                                ?></h5>
                        </div>
                        <div class="col-md">
                            <h5><b>Grado:</b> <?= $funcionario->grado ?></h5>
                        </div>
                        <div class="col-md">
                            <h5><b>Departamento: </b><?= $departamento->nombre ?></h5>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="card card">
                <div class="card-header">
                    <div>
                        <h3 class="card-title"><b>Datos del Cometido</b></h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md">
                            <h5><strong>Motivo del Cometido: </strong><?= $cometido->motivo_cometido ?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <h5><b>Fecha Inicio:</b> <?= $cometido->fecha_inicio ?></h5>
                            <h5><b>Hora Inicio:</b> <?= $cometido->hora_inicio ?></h5>
                        </div>
                        <div class="col-md">
                            <h5><b>Fecha Regreso:</b> <?= $cometido->fecha_fin ?></h5>
                            <h5><b>Hora Regreso:</b> <?= $cometido->hora_fin ?></h5>
                        </div>
                        <div class="col-md">
                            <h5><b>Dias con pernoctar:</b> <?= $cometido->dias_con_pernoctar ?></h5>
                            <h5><b>Dias sin pernoctar: </b><?= $cometido->dias_sin_pernoctar ?></h5>
                            <h5><b>Con Viatico:</b>
                                <?php if ($cometido->con_viatico == '1') {
                                    echo 'SI';
                                } else {
                                    echo 'NO';
                                } ?></h5>
                        </div>
                        <div class="col-md">
                            <h5><b>Tipo Transporte IDA:</b>
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
                            <h5><b>Tipo Transporte REGRESO:</b>
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
                            <h5><b>Item Presupuestario:</b> <?= $item->nombre_item ?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <h5><b>Estado del Cometido:</b>
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
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="card card">
                <div class="card-header">
                    <div>
                        <h3 class="card-title"><b>Destinos del Cometido</b></h3>
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

                                ],
                            ]); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="card card">
                <div class="card-header">
                    <div>
                        <h3 class="card-title"><b>Firmas</b></h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md">
                            <h5><b>Firma Jefe Departamento</b></h5>
                            <?php
                            if ($jefe != null) {
                                echo $jefe->nombre;
                            };
                            ?>
                        </div>  
                        <div class="col-md">
                            <h5><b>Firma Funcionario</b></h5>
                            <?= $funcionario->nombre ?>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md">
                            <h5><b>Firma Jefe Director</b></h5>
                            <?php
                            if ($director != null) {
                                echo $director->nombre;
                            };
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>