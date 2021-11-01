<?php

namespace app\controllers;

use app\models\Departamento;
use app\models\DepartamentoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DepartamentoController implements the CRUD actions for Departamento model.
 */
class DepartamentoController extends Controller
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
     * Lists all Departamento models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DepartamentoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Departamento model.
     * @param int $id_departamento Id Departamento
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_departamento)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_departamento),
        ]);
    }

    /**
     * Creates a new Departamento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Departamento();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_departamento' => $model->id_departamento]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Departamento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_departamento Id Departamento
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_departamento)
    {
        $model = $this->findModel($id_departamento);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_departamento' => $model->id_departamento]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Departamento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_departamento Id Departamento
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_departamento)
    {
        $this->findModel($id_departamento)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Departamento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_departamento Id Departamento
     * @return Departamento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_departamento)
    {
        if (($model = Departamento::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
