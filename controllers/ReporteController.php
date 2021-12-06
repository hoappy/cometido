<?php

namespace app\controllers;

use app\models\Destino;
use app\models\Sector;
use app\models\SectorSearch;
use yii\data\SqlDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

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
        $model = new SqlDataProvider([
            'sql' => "select * from cometido 
            where estado = 6 and (tranporte_ida = 0 or transporte_regreso = 0)",
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('viatico', [
            'model' => $model,
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
