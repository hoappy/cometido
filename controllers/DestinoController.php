<?php

namespace app\controllers;

use app\models\Ciudad;
use app\models\Destino;
use app\models\Destinos;
use app\models\DestinoSearch;
use app\models\Provincia;
use app\models\Region;
use app\models\Sector;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DestinoController implements the CRUD actions for Destino model.
 */
class DestinoController extends Controller
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
     * Lists all Destino models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DestinoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Destino model.
     * @param int $id_destino Id Destino
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
     * Creates a new Destino model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_cometido)
    {
        $model = new Destinos();
        $model->fk_id_cometido = $id_cometido;

        $msg = null;

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {

                $validacion = Destino::find()
                            ->select(['fk_id_sector as id_sector'])
                            ->where(['fk_id_cometido' => $model->fk_id_cometido])
                            ->andWhere(['fk_id_sector' => $model->fk_id_sector])
                            ;
                
                if($validacion->count() >= 1){
                    $msg = 'El Destino Ya ha Sido Agregado';
                    return $this->redirect(['destino/create', 'id_cometido' => $model->fk_id_cometido, 'msg' => $msg]);
                }else{

                    $destino = new Destino();

                    $destino->fk_id_cometido = $model->fk_id_cometido;
                    $destino->fk_id_sector = $model->fk_id_sector;

                    if ($destino->save(false)) {
                        $msg = 'Destino Agregado Corecctamente';
                        return $this->redirect(['destino/create', 'id_cometido' => $destino->fk_id_cometido, 'msg' => $msg]);
                    }
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'msg' => $msg,
        ]);
    }

    /**
     * Updates an existing Destino model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_destino Id Destino
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_destino]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Destino model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_destino Id Destino
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Destino model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_destino Id Destino
     * @return Destino the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Destino::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
