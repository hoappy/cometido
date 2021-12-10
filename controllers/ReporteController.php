<?php

namespace app\controllers;

use app\models\Destino;
use app\models\FormFecha;
use app\models\Sector;
use app\models\SectorSearch;
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
                ->where(['>=', 'fecha_inicio', $fecha->inicio])
                ->andWhere(['<=', 'fecha_fin', $fecha->fin])
                ->groupBy('month(fecha_inicio)')
                ->all();

            //return print_r($modelArray);

            $model[] = ['Mes', 'Monto'];
            $model2[] = ['Mes', 'Cantidad'];

            foreach ($modelArray as $value) {

                if ($value['mes'] == 1) {
                    $model[] = ['Enero', (double)$value['cant']];
                    $model2[] = ['Enero', (double)$value['suma']];
                } elseif ($value['mes'] == 2) {
                    $model[] = ['Febrero', (double)$value['cant']];
                    $model2[] = ['Febrero', (double)$value['suma']];
                } elseif ($value['mes'] == 3) {
                    $model[] = ['Marzo', (double)$value['cant']];
                    $model2[] = ['Marzo', (double)$value['suma']];
                } elseif ($value['mes'] == 4) {
                    $model[] = ['Abril', (double)$value['cant']];
                    $model2[] = ['Abril', (double)$value['suma']];
                } elseif ($value['mes'] == 5) {
                    $model[] = ['Mayo', (double)$value['cant']];
                    $model2[] = ['Mayo', (double)$value['suma']];
                } elseif ($value['mes'] == 6) {
                    $model[] = ['Junio', (double)$value['cant']];
                    $model2[] = ['Junio', (double)$value['suma']];
                } elseif ($value['mes'] == 7) {
                    $model[] = ['Julio', (double)$value['cant']];
                    $model2[] = ['Julio', (double)$value['suma']];
                } elseif ($value['mes'] == 8) {
                    $model[] = ['Agosto', (double)$value['cant']];
                    $model2[] = ['Agosto', (double)$value['suma']];
                } elseif ($value['mes'] == 9) {
                    $model[] = ['Septrimbre', (double)$value['cant']];
                    $model2[] = ['Septiembre', (double)$value['suma']];
                } elseif ($value['mes'] == 10) {
                    $model[] = ['Octubre', (double)$value['cant']];
                    $model2[] = ['Octubre', (double)$value['suma']];
                } elseif ($value['mes'] == 11) {
                    $model[] = ['Noviembre', (double)$value['cant']];
                    $model2[] = ['Noviembre', (double)$value['suma']];
                } elseif ($value['mes'] == 12) {
                    $model[] = ['Diciembre', (double)$value['cant']];
                    $model2[] = ['Diciembre', (double)$value['suma']];
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

                    'data' => $model,

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

                    'data' => $model2,

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
        }


        return $this->render('viatico', [
            'model' => $model,
            'fecha' => $fecha,
            'chartGoogleSuma' => $chartGoogleSuma,
            'chartGoogleCant' => $chartGoogleCant,
        ]);
    }

    public function actionSector()
    {
        $model = new SqlDataProvider([
            'sql' => "select * from cometido 
            where estado = 6 and (tranporte_ida = 0 or transporte_regreso = 0)",
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('sector', [
            'model' => $model,
        ]);
    }

    public function actionViaje()
    {
        $model = new SqlDataProvider([
            'sql' => "select * from cometido 
            where estado = 6 and (tranporte_ida = 0 or transporte_regreso = 0)",
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('viaje', [
            'model' => $model,
        ]);
    }
}
