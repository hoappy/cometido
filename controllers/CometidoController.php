<?php

namespace app\controllers;

use app\models\Cometido;
//use app\models\Destinos;
use app\models\CometidoSearch;
use app\models\Departamento;
use app\models\Destino;
use app\models\ItemPresupuestario;
use app\models\Users;
use yii\data\SqlDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CometidoController implements the CRUD actions for Cometido model.
 */
class CometidoController extends Controller
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
     * Lists all Cometido models.
     * @return mixed
     */
    //listado de todos los cometidos
    public function actionIndex()
    {
        $searchModel = new CometidoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    //mis cometidos
    public function actionIndex1()
    {
        $searchModel = new CometidoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    //cometidos por autorizar
    public function actionIndex2()
    {
        $searchModel = new CometidoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    //cometidos por aprobar
    public function actionIndex3()
    {
        $searchModel = new CometidoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    //cometidos ya aprobados
    public function actionIndex4()
    {
        $searchModel = new CometidoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cometido model.
     * @param int $id_cometido Id Cometido
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView2($id)
    {
        $model = Cometido::findOne($id);
        $funcionario = Users::findOne($model->fk_id);
        $departamento = Departamento::findOne($funcionario->fk_id_departamento);
        

        return $this->render('view-original', [
            'model' => $model, 
            'funcionario' => $funcionario,
            'departamento' => $departamento,
            
        ]);
    }
    public function actionView($id)
    {
        $cometido = Cometido::findOne($id);
        $funcionario = Users::findOne($cometido->fk_id_funcionario);
        $departamento = Departamento::findOne($funcionario->fk_id_departamento);
        /*$jefe = Users::findOne([
            'fk_id_departamento'=>$funcionario->fk_id_departamento, 
            //agregar relacion entre cometido u usuario para ver la relacion entre jefe o jefe suplente
            'role' => '4'  // el rol 4 es jefe de departamento
        ]); *///consulta antes de modificar la BDD
        $jefe = Users::findOne($cometido->fk_id_jefe);
        $item = ItemPresupuestario::findOne($cometido->fk_id_item);
        $director = Users::findOne($cometido->fk_id_director);

        $destinos = new SqlDataProvider([
            'sql' => "select nombre_region, numero_region, nombre_provincia, nombre_ciudad, nombre_sector from destino 
            join sector on sector.id_sector = destino.fk_id_sector 
            join ciudad on ciudad.id_ciudad = sector.fk_id_ciudad
            join provincia on provincia.id_provincia = ciudad.fk_id_provincia
            join region on region.id_region = provincia.fk_id_region
            where destino.fk_id_cometido = '$id'",
           
        ]);

        return $this->render('view', [
            'cometido' => $cometido, 
            'funcionario' => $funcionario,
            'departamento' => $departamento,
            'jefe' => $jefe,
            'item' => $item,
            'director' => $director,
            'destinos' => $destinos,
        ]);
    }

    /**
     * Creates a new Cometido model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cometido();

        $model->fk_id_funcionario = 1; //temporar, aqui extrarr el id de la sesion 

        $model->estado = 0;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['destino/create', 'id_cometido' => $model->id_cometido]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Cometido model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_cometido Id Cometido
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_cometido]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cometido model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_cometido Id Cometido
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cometido model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_cometido Id Cometido
     * @return Cometido the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cometido::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
