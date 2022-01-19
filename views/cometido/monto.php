<?php

use app\models\Users;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Viaje */

$this->title = 'Ingresar Monto Solucitud Numero: ' . $model->id_cometido;
$this->params['breadcrumbs'][] = ['label' => 'Cometidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Solucitud Numero: ' . $model->id_cometido, 'url' => ['view', 'id' => $model->id_cometido]];
$this->params['breadcrumbs'][] = 'Ingresar Monto ';
?>
<div class="viaje-update">

    <div class="card card-info">
        <div class="card-header">
            <div>
                <h3 class="card-title"><b><?= Html::encode($this->title) ?></b></h3>
            </div>
        </div>
        <div class="card-body">
            <?= $this->render('_formMonto', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
    <div class="card card-info">
        <div class="card-header">
            <div>
                <h3 class="card-title"><b>Datos Del Funcionario</b></h3>
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
                    <h5><b>Grado: </b><?= $funcionario->grado ?></h5>
                </div>
                <div class="col-md">
                    <h5><b>Departamento: </b><?= $departamento->nombre ?></h5>
                </div>

            </div>
        </div>
    </div>
    <div class="card card-info">

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
                    <h5><b>Fecha Inicio: </b><?= $cometido->fecha_inicio ?></h5>
                    <h5><b>Hora Inicio: </b><?= $cometido->hora_inicio ?></h5>
                </div>
                <div class="col-md">
                    <h5><b>Fecha Regreso: </b><?= $cometido->fecha_fin ?></h5>
                    <h5><b>Hora Regreso: </b><?= $cometido->hora_fin ?></h5>
                </div>
                <div class="col-md">
                    <h5><b>Dias con pernoctar: </b><?= $cometido->dias_con_pernoctar ?></h5>
                    <h5><b>Dias sin pernoctar: </b><?= $cometido->dias_sin_pernoctar ?></h5>
                    <h5><b>Con Viatico:</b>
                        <?php if ($cometido->con_viatico == '1') {
                            echo 'SI';
                        } else {
                            echo 'NO';
                        } ?></h5>
                </div>
                <div class="col-md">
                    <h5><b>Tipo Transporte IDA:
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

        </div>
    </div>
</div>