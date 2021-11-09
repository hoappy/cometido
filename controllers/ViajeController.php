<?php

namespace app\controllers;

use app\models\Cometido;
use app\models\Viaje;
use app\models\ViajeSearch;
use Yii;
use yii\data\SqlDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ViajeController implements the CRUD actions for Viaje model.
 */
class ViajeController extends Controller
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
     * Lists all Viaje models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ViajeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Viaje model.
     * @param int $id_viaje Id Viaje
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Viaje model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Viaje();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_viaje]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Viaje model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_viaje Id Viaje
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_viaje]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Viaje model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_viaje Id Viaje
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Viaje model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_viaje Id Viaje
     * @return Viaje the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Viaje::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionAsignar()
    {
        $model = new Viaje();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_viaje]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('asignar', [
            'model' => $model,
        ]);
    }

    public function actionSalida($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_viaje]);
        }

        return $this->render('salida', [
            'model' => $model,
        ]);
    }

    public function actionLlegada($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_viaje]);
        }

        return $this->render('llegada', [
            'model' => $model,
        ]);
    }

    public function actionCometido($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_viaje]);
        }

        return $this->render('llegada', [
            'model' => $model,
        ]);
    }

    //todos los cometidos
    public function actionCometidos()
    {

        $model = new SqlDataProvider([
            'sql' => "select * from cometido 
            where estado >= 3 and estado <= 6 and tranporte_ida = 0 or transporte_regreso = 0",
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    //cometidos por iniciar
    public function actionCometidos1()
    {

        $model = new SqlDataProvider([
            'sql' => "select * from cometido 
            where estado = 4 and tranporte_ida = 0 or transporte_regreso = 0",
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    //cometidos iniciados
    public function actionCometidos2()
    {

        $model = new SqlDataProvider([
            'sql' => "select * from cometido 
            where estado = 5 and tranporte_ida = 0 or transporte_regreso = 0",
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    //cometidos terminados
    public function actionCometidos3()
    {

        $model = new SqlDataProvider([
            'sql' => "select * from cometido 
            where estado = 6 and tranporte_ida = 0 or transporte_regreso = 0",
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    //asignar vehiculo
    public function actionCometidos4()
    {

        $model = new SqlDataProvider([
            'sql' => "select * from cometido 
            where estado = 3 and tranporte_ida = 0 or transporte_regreso = 0",
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
