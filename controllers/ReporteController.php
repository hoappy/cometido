<?php

namespace app\controllers;

use app\models\Destino;
use app\models\FormFecha;
use app\models\FormFechaID;
use app\models\Sector;
use app\models\SectorSearch;
use app\models\Vehiculo;
use yii\data\SqlDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

use scotthuangzl\googlechart\GoogleChart;

/**
 * SectorController implements the CRUD actions for Sector model.
 */
class ReporteController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Sector models.
     * @return mixed
     */
    public function actionCometido()
    {
        $model = new SqlDataProvider([
            'sql' => "select * from cometido 
            where estado = 6 and (tranporte_ida = 0 or transporte_regreso = 0)",
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('cometido', [
            'model' => $model,
        ]);
    }

    public function actionViatico()
    {
        $fecha = new FormFecha();

        if ($this->request->isPost) {

            $fecha->load($this->request->post());
            //return print_r($this->request->post());

            $modelArray  = (new \yii\db\Query())
                ->select('MONTH(fecha_inicio) as mes, sum(monto) as suma, count(MONTH(fecha_inicio)) as cant')
                ->from('cometido')
                ->where(['>=', 'fecha_inicio', "$fecha->inicio"])
                ->andWhere(['<=', 'fecha_inicio', $fecha->fin])
                ->groupBy('month(fecha_inicio)')
                ->all();

            //return print_r($modelArray);

            $modelsql = new SqlDataProvider([
                'sql' => "select MONTH(fecha_inicio) as mes, sum(monto) as Total, count(MONTH(fecha_inicio)) as Cantidad
                    from cometido 
                    where fecha_inicio >= '$fecha->inicio'
                    and fecha_inicio <= '$fecha->fin'
                    group by month(fecha_inicio)",
            ]);

            if($modelArray == null)
            {
                return $this->render('viatico', [
                    //'model' => $model,
                    'fecha' => $fecha,
                    'chartGoogleSuma' => 'No existen Datos en el Rango de Fechas Seleccionado',
                    'chartGoogleCant' => 'No existen Datos en el Rango de Fechas Seleccionado',
                    'model' => $modelsql,
                ]);
            }
            //return print_r($modelsql);

            $model[] = ['Mes', 'Cantidad'];
            $model2[] = ['Mes', 'Monto'];

            foreach ($modelArray as $value) {

                if ($value['mes'] == 1) {
                    $model[] = ['Enero', (float)$value['cant']];
                    $model2[] = ['Enero', (float)$value['suma']];
                } elseif ($value['mes'] == 2) {
                    $model[] = ['Febrero', (float)$value['cant']];
                    $model2[] = ['Febrero', (float)$value['suma']];
                } elseif ($value['mes'] == 3) {
                    $model[] = ['Marzo', (float)$value['cant']];
                    $model2[] = ['Marzo', (float)$value['suma']];
                } elseif ($value['mes'] == 4) {
                    $model[] = ['Abril', (float)$value['cant']];
                    $model2[] = ['Abril', (float)$value['suma']];
                } elseif ($value['mes'] == 5) {
                    $model[] = ['Mayo', (float)$value['cant']];
                    $model2[] = ['Mayo', (float)$value['suma']];
                } elseif ($value['mes'] == 6) {
                    $model[] = ['Junio', (float)$value['cant']];
                    $model2[] = ['Junio', (float)$value['suma']];
                } elseif ($value['mes'] == 7) {
                    $model[] = ['Julio', (float)$value['cant']];
                    $model2[] = ['Julio', (float)$value['suma']];
                } elseif ($value['mes'] == 8) {
                    $model[] = ['Agosto', (float)$value['cant']];
                    $model2[] = ['Agosto', (float)$value['suma']];
                } elseif ($value['mes'] == 9) {
                    $model[] = ['Septrimbre', (float)$value['cant']];
                    $model2[] = ['Septiembre', (float)$value['suma']];
                } elseif ($value['mes'] == 10) {
                    $model[] = ['Octubre', (float)$value['cant']];
                    $model2[] = ['Octubre', (float)$value['suma']];
                } elseif ($value['mes'] == 11) {
                    $model[] = ['Noviembre', (float)$value['cant']];
                    $model2[] = ['Noviembre', (float)$value['suma']];
                } elseif ($value['mes'] == 12) {
                    $model[] = ['Diciembre', (float)$value['cant']];
                    $model2[] = ['Diciembre', (float)$value['suma']];
                }

                /*if ($value['mes'] == 1) {
                    $model[] = [$value['suma'], $value['cant'], 'Enero'];
                } elseif ($value['mes'] == 2) {
                    $model[] = [$value['suma'], $value['cant'], 'Febrero'];
                } elseif ($value['mes'] == 3) {
                    $model[] = [$value['suma'], $value['cant'], 'Marzo'];
                } elseif ($value['mes'] == 4) {
                    $model[] = [$value['suma'], $value['cant'], 'Abril'];
                } elseif ($value['mes'] == 5) {
                    $model[] = [$value['suma'], $value['cant'], 'Mayo'];
                } elseif ($value['mes'] == 6) {
                    $model[] = [$value['suma'], $value['cant'], 'Junio'];
                } elseif ($value['mes'] == 7) {
                    $model[] = [$value['suma'], $value['cant'], 'Julio'];
                } elseif ($value['mes'] == 8) {
                    $model[] = [$value['suma'], $value['cant'], 'Agosto'];
                } elseif ($value['mes'] == 9) {
                    $model[] = [$value['suma'], $value['cant'], 'Septiembre'];
                } elseif ($value['mes'] == 10) {
                    $model[] = [$value['suma'], $value['cant'], 'Octubre'];
                } elseif ($value['mes'] == 11) {
                    $model[] = [$value['suma'], $value['cant'], 'Noviembre'];
                } elseif ($value['mes'] == 12) {
                    $model[] = [$value['suma'], $value['cant'], 'Diciembre'];
                }*/
            }

            //return print_r($model). print_r($model2);

            $chartGoogleSuma =  GoogleChart::widget(

                array(
                    'visualization' => 'ColumnChart',

                    'data' => $model2,

                    'options' => array(

                        'title' => 'Total de Monto Viaticos por mes',

                        'legend' => ['position' => 'top', 'alignment' => 'center'],

                        'width' => '100%',

                        'height' => 500,

                        'backgroundColor' => ['fill' => 'transparent']

                    )
                )
            );

            $chartGoogleCant =  GoogleChart::widget(

                array(
                    'visualization' => 'ColumnChart',

                    'data' => $model,

                    'options' => array(

                        'title' => 'Cantidad de Viaticos por mes',

                        'legend' => ['position' => 'top', 'alignment' => 'center'],

                        'width' => '100%',

                        'height' => 500,

                        'backgroundColor' => ['fill' => 'transparent']

                    )
                )
            );
        } else {
            $model = null;
            $model2 = null;
            $chartGoogleCant = null;
            $chartGoogleSuma = null;
            $modelsql = null;
        }


        return $this->render('viatico', [
            //'model' => $model,
            'fecha' => $fecha,
            'chartGoogleSuma' => $chartGoogleSuma,
            'chartGoogleCant' => $chartGoogleCant,
            'model' => $modelsql,
        ]);
    }

    public function actionSector()
    {
        $fecha = new FormFecha();

        if ($this->request->isPost) {

            $fecha->load($this->request->post());
            //return print_r($this->request->post());

            $modelArray  = (new \yii\db\Query())
                ->select('MONTH(fecha_inicio) as mes, sum(monto) as suma, count(MONTH(fecha_inicio)) as cant')
                ->from('cometido')
                ->where(['>=', 'fecha_inicio', "$fecha->inicio"])
                ->andWhere(['<=', 'fecha_inicio', $fecha->fin])
                ->groupBy('month(fecha_inicio)')
                ->all();

            //return print_r($modelArray);

            $modelsql = new SqlDataProvider([
                'sql' => "select MONTH(fecha_inicio) as mes, sum(monto) as Total, count(MONTH(fecha_inicio)) as Cantidad
                    from cometido 
                    where fecha_inicio >= '$fecha->inicio'
                    and fecha_inicio <= '$fecha->fin'
                    group by month(fecha_inicio)",
            ]);

            if($modelArray == null)
            {
                return $this->render('viatico', [
                    //'model' => $model,
                    'fecha' => $fecha,
                    'chartGoogleSuma' => 'No existen Datos en el Rango de Fechas Seleccionado',
                    'chartGoogleCant' => 'No existen Datos en el Rango de Fechas Seleccionado',
                    'model' => $modelsql,
                ]);
            }
            //return print_r($modelsql);

            $model[] = ['Mes', 'Cantidad'];
            $model2[] = ['Mes', 'Monto'];

            foreach ($modelArray as $value) {

                if ($value['mes'] == 1) {
                    $model[] = ['Enero', (float)$value['cant']];
                    $model2[] = ['Enero', (float)$value['suma']];
                } elseif ($value['mes'] == 2) {
                    $model[] = ['Febrero', (float)$value['cant']];
                    $model2[] = ['Febrero', (float)$value['suma']];
                } elseif ($value['mes'] == 3) {
                    $model[] = ['Marzo', (float)$value['cant']];
                    $model2[] = ['Marzo', (float)$value['suma']];
                } elseif ($value['mes'] == 4) {
                    $model[] = ['Abril', (float)$value['cant']];
                    $model2[] = ['Abril', (float)$value['suma']];
                } elseif ($value['mes'] == 5) {
                    $model[] = ['Mayo', (float)$value['cant']];
                    $model2[] = ['Mayo', (float)$value['suma']];
                } elseif ($value['mes'] == 6) {
                    $model[] = ['Junio', (float)$value['cant']];
                    $model2[] = ['Junio', (float)$value['suma']];
                } elseif ($value['mes'] == 7) {
                    $model[] = ['Julio', (float)$value['cant']];
                    $model2[] = ['Julio', (float)$value['suma']];
                } elseif ($value['mes'] == 8) {
                    $model[] = ['Agosto', (float)$value['cant']];
                    $model2[] = ['Agosto', (float)$value['suma']];
                } elseif ($value['mes'] == 9) {
                    $model[] = ['Septrimbre', (float)$value['cant']];
                    $model2[] = ['Septiembre', (float)$value['suma']];
                } elseif ($value['mes'] == 10) {
                    $model[] = ['Octubre', (float)$value['cant']];
                    $model2[] = ['Octubre', (float)$value['suma']];
                } elseif ($value['mes'] == 11) {
                    $model[] = ['Noviembre', (float)$value['cant']];
                    $model2[] = ['Noviembre', (float)$value['suma']];
                } elseif ($value['mes'] == 12) {
                    $model[] = ['Diciembre', (float)$value['cant']];
                    $model2[] = ['Diciembre', (float)$value['suma']];
                }
            }

            //return print_r($model). print_r($model2);

            $chartGoogleSuma =  GoogleChart::widget(

                array(
                    'visualization' => 'ColumnChart',

                    'data' => $model2,

                    'options' => array(

                        'title' => 'Total de Monto Viaticos por mes',

                        'legend' => ['position' => 'top', 'alignment' => 'center'],

                        'width' => '100%',

                        'height' => 500,

                        'backgroundColor' => ['fill' => 'transparent']

                    )
                )
            );

            $chartGoogleCant =  GoogleChart::widget(

                array(
                    'visualization' => 'ColumnChart',

                    'data' => $model,

                    'options' => array(

                        'title' => 'Cantidad de Viaticos por mes',

                        'legend' => ['position' => 'top', 'alignment' => 'center'],

                        'width' => '100%',

                        'height' => 500,

                        'backgroundColor' => ['fill' => 'transparent']

                    )
                )
            );
        } else {
            $model = null;
            $model2 = null;
            $chartGoogleCant = null;
            $chartGoogleSuma = null;
            $modelsql = null;
        }


        return $this->render('viatico', [
            //'model' => $model,
            'fecha' => $fecha,
            'chartGoogleSuma' => $chartGoogleSuma,
            'chartGoogleCant' => $chartGoogleCant,
            'model' => $modelsql,
        ]);
    }

    public function actionRechazo()
    {
        $fecha = new FormFecha();

        if ($this->request->isPost) {

            $fecha->load($this->request->post());
            //return print_r($this->request->post());

            $modelArray  = (new \yii\db\Query())
                ->select('MONTH(fecha_inicio) as mes, count(MONTH(fecha_inicio)) as cant')
                ->from('cometido')
                ->where(['=', 'estado', '10'])
                ->andwhere(['>=', 'fecha_inicio', "$fecha->inicio"])
                ->andWhere(['<=', 'fecha_inicio', $fecha->fin])
                ->groupBy('month(fecha_inicio)')
                ->all();

            //return print_r($modelArray);

            $modelsql = new SqlDataProvider([
                'sql' => "select MONTH(fecha_inicio) as mes, sum(monto) as Total, count(MONTH(fecha_inicio)) as Cantidad
                    from cometido 
                    where estado = 10
                    and fecha_inicio >= '$fecha->inicio'
                    and fecha_inicio <= '$fecha->fin'
                    group by month(fecha_inicio)",
            ]);

            if($modelArray == null)
            {
                return $this->render('rechazo', [
                    'fecha' => $fecha,
                    'chartGoogleCant' => 'No existen Datos en el Rango de Fechas Seleccionado',
                    'model' => $modelsql,
                ]);
            }
            //return print_r($modelsql);

            $model[] = ['Mes', 'Cantidad'];

            foreach ($modelArray as $value) {

                if ($value['mes'] == 1) {
                    $model[] = ['Enero', (float)$value['cant']];
                } elseif ($value['mes'] == 2) {
                    $model[] = ['Febrero', (float)$value['cant']];
                } elseif ($value['mes'] == 3) {
                    $model[] = ['Marzo', (float)$value['cant']];
                } elseif ($value['mes'] == 4) {
                    $model[] = ['Abril', (float)$value['cant']];
                } elseif ($value['mes'] == 5) {
                    $model[] = ['Mayo', (float)$value['cant']];
                } elseif ($value['mes'] == 6) {
                    $model[] = ['Junio', (float)$value['cant']];
                } elseif ($value['mes'] == 7) {
                    $model[] = ['Julio', (float)$value['cant']];
                } elseif ($value['mes'] == 8) {
                    $model[] = ['Agosto', (float)$value['cant']];
                } elseif ($value['mes'] == 9) {
                    $model[] = ['Septrimbre', (float)$value['cant']];
                } elseif ($value['mes'] == 10) {
                    $model[] = ['Octubre', (float)$value['cant']];
                } elseif ($value['mes'] == 11) {
                    $model[] = ['Noviembre', (float)$value['cant']];
                } elseif ($value['mes'] == 12) {
                    $model[] = ['Diciembre', (float)$value['cant']];
                }
            }

            //return print_r($model). print_r($model2);

            $chartGoogleCant =  GoogleChart::widget(

                array(
                    'visualization' => 'ColumnChart',

                    'data' => $model,

                    'options' => array(

                        'title' => 'Cantidad de Viaticos por mes',

                        'legend' => ['position' => 'top', 'alignment' => 'center'],

                        'width' => '100%',

                        'height' => 500,

                        'backgroundColor' => ['fill' => 'transparent']

                    )
                )
            );
        } else {
            $model = null;
            $chartGoogleCant = null;
            $modelsql = null;
        }


        return $this->render('rechazo', [
            //'model' => $model,
            'fecha' => $fecha,
            'chartGoogleCant' => $chartGoogleCant,
            'model' => $modelsql,
        ]);
    }

    public function actionViaje()
    {
        $fecha = new FormFechaID();

        if ($this->request->isPost) {

            $fecha->load($this->request->post());
            //return print_r($this->request->post());

            //return print_r($fecha->id);

            $modelArray  = (new \yii\db\Query())
                ->select('MONTH(cometido.fecha_inicio) as mes, vehiculo.marca as marca, vehiculo.patente as patente, vehiculo.modelo as modelo, sum(viaje.kilometros_total) as kilometros, sum(viaje.combustible_litros) as litros, sum(viaje.combustible_pesos) as pesos')
                ->from('viaje')
                ->innerJoin('vehiculo','vehiculo.id_vehiculo = viaje.fk_id_vehiculo')
                ->innerJoin('cometido','cometido.id_cometido = viaje.fk_id_cometido')
                ->andwhere(['>=', 'cometido.fecha_inicio', "$fecha->inicio"])
                ->andWhere(['<=', 'cometido.fecha_inicio', $fecha->fin]) <
                ->andWhere(['=', 'viaje.fk_id_vehiculo', $fecha->id])
                ->groupBy('viaje.fk_id_vehiculo, MONTH(cometido.fecha_inicio)')
                ->all();
            //return print_r($modelArray);

            $modelsql = new SqlDataProvider([
                'sql' => "select MONTH(cometido.fecha_inicio) as mes, vehiculo.marca as marca, vehiculo.patente as patente, vehiculo.modelo as modelo, sum(viaje.kilometros_total) as kilometros, sum(viaje.combustible_litros) as litros, sum(viaje.combustible_pesos) as pesos
                    from viaje
                    INNER JOIN  vehiculo on vehiculo.id_vehiculo = viaje.fk_id_vehiculo
                    INNER JOIN  cometido on cometido.id_cometido = viaje.fk_id_cometido
                    and cometido.fecha_inicio >= '$fecha->inicio'
                    and cometido.fecha_inicio <= '$fecha->fin'
                    and viaje.fk_id_vehiculo = '$fecha->id'
                    group by viaje.fk_id_vehiculo, MONTH(cometido.fecha_inicio)",
            ]);
            //return print_r($modelsql);

            if($modelArray == null)
            {
                return $this->render('viaje', [
                    'fecha' => $fecha,
                    'chartGoogleKilometros' => 'No existen Datos en el Rango de Fechas Seleccionado',
                    'chartGoogleLitros' => 'No existen Datos en el Rango de Fechas Seleccionado',
                    'chartGooglePesos' => 'No existen Datos en el Rango de Fechas Seleccionado',
                    'model' => $modelsql,
                ]);
            }

            $model[] = ['Mes', 'Kilometros Totales'];
            $model2[] = ['Mes', 'Combustible en Litros'];
            $model3[] = ['Mes', 'Combustible en Litros'];

            foreach ($modelArray as $value) {

                if ($value['mes'] == 1) {
                    $model[] = ['Enero', (float)$value['kilometros']];
                    $model2[] = ['Enero', (float)$value['litros']];
                    $model3[] = ['Enero', (float)$value['pesos']];
                } elseif ($value['mes'] == 2) {
                    $model[] = ['Febrero', (float)$value['kilometros']];
                    $model2[] = ['Febrero', (float)$value['litros']];
                    $model3[] = ['Febrero', (float)$value['pesos']];
                } elseif ($value['mes'] == 3) {
                    $model[] = ['Marzo', (float)$value['kilometros']];
                    $model2[] = ['Marzo', (float)$value['litros']];
                    $model3[] = ['Marzo', (float)$value['pesos']];
                } elseif ($value['mes'] == 4) {
                    $model[] = ['Abril', (float)$value['kilometros']];
                    $model2[] = ['Abril', (float)$value['litros']];
                    $model3[] = ['Abril', (float)$value['pesos']];
                } elseif ($value['mes'] == 5) {
                    $model[] = ['Mayo', (float)$value['kilometros']];
                    $model2[] = ['Mayo', (float)$value['litros']];
                    $model3[] = ['Mayo', (float)$value['pesos']];
                } elseif ($value['mes'] == 6) {
                    $model[] = ['Junio', (float)$value['kilometros']];
                    $model2[] = ['Junio', (float)$value['litros']];
                    $model3[] = ['Junio', (float)$value['pesos']];
                } elseif ($value['mes'] == 7) {
                    $model[] = ['Julio', (float)$value['kilometros']];
                    $model2[] = ['Julio', (float)$value['litros']];
                    $model3[] = ['Julio', (float)$value['pesos']];
                } elseif ($value['mes'] == 8) {
                    $model[] = ['Agosto', (float)$value['kilometros']];
                    $model2[] = ['Agosto', (float)$value['litros']];
                    $model3[] = ['Agosto', (float)$value['pesos']];
                } elseif ($value['mes'] == 9) {
                    $model[] = ['Septrimbre', (float)$value['kilometros']];
                    $model2[] = ['Septiembre', (float)$value['litros']];
                    $model3[] = ['Septrimbre', (float)$value['pesos']];
                } elseif ($value['mes'] == 10) {
                    $model[] = ['Octubre', (float)$value['kilometros']];
                    $model2[] = ['Octubre', (float)$value['litros']];
                    $model3[] = ['Octubre', (float)$value['pesos']];
                } elseif ($value['mes'] == 11) {
                    $model[] = ['Noviembre', (float)$value['kilometros']];
                    $model2[] = ['Noviembre', (float)$value['litros']];
                    $model3[] = ['Noviembre', (float)$value['pesos']];
                } elseif ($value['mes'] == 12) {
                    $model[] = ['Diciembre', (float)$value['kilometros']];
                    $model2[] = ['Diciembre', (float)$value['litros']];
                    $model3[] = ['Diciembre', (float)$value['pesos']];
                }
            }

            //return print_r($model). print_r($model2);

            $chartGoogleKilometros =  GoogleChart::widget(

                array(
                    'visualization' => 'ColumnChart',

                    'data' => $model,

                    'options' => array(

                        'title' => 'Kilometros Totales ',

                        'legend' => ['position' => 'top', 'alignment' => 'center'],

                        'width' => '100%',

                        'height' => 500,

                        'backgroundColor' => ['fill' => 'transparent']

                    )
                )
            );

            $chartGoogleLitros =  GoogleChart::widget(

                array(
                    'visualization' => 'ColumnChart',

                    'data' => $model2,

                    'options' => array(

                        'title' => 'Litros Totales',

                        'legend' => ['position' => 'top', 'alignment' => 'center'],

                        'width' => '100%',

                        'height' => 500,

                        'backgroundColor' => ['fill' => 'transparent']

                    )
                )
            );

            $chartGooglePesos =  GoogleChart::widget(

                array(
                    'visualization' => 'ColumnChart',

                    'data' => $model3,

                    'options' => array(

                        'title' => 'Pesos Totales',

                        'legend' => ['position' => 'top', 'alignment' => 'center'],

                        'width' => '100%',

                        'height' => 500,

                        'backgroundColor' => ['fill' => 'transparent']

                    )
                )
            );
        } else {
            $model = null;
            $chartGoogleKilometros = null;
            $chartGoogleLitros = null;
            $chartGooglePesos = null;
            $modelsql = null;
        }


        return $this->render('viaje', [
            'fecha' => $fecha,
            'chartGoogleKilometros' => $chartGoogleKilometros,
            'chartGoogleLitros' => $chartGoogleLitros,
            'chartGooglePesos' => $chartGooglePesos,
            'model' => $modelsql,
        ]);
    }
}
