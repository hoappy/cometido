<?php

namespace app\controllers;

use app\models\Ciudad;
use app\models\Destino;
use app\models\Destinos;
use app\models\DestinoSearch;
use app\models\Provincia;
use app\models\Region;
use app\models\Sector;
use app\models\User;
use Yii;
use yii\data\SqlDataProvider;
use yii\filters\AccessControl;
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
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'create', 'index', 'view', 'update', 'delete'],
                'rules' => [
                    [//eliminar este usuario al finalizar el proyecto
                        //El administrador tiene permisos sobre las siguientes acciones
                        'actions' =>  ['logout', 'create', 'delete'],
                        //Esta propiedad establece que tiene permisos
                        'allow' => true,
                        //Usuarios autenticados, el signo ? es para invitados
                        'roles' => ['@'],
                        //Este método nos permite crear un filtro sobre la identidad del usuario
                        //y así establecer si tiene permisos o no
                        'matchCallback' => function ($rule, $action) {
                            //Llamada al método que comprueba si es un administrador
                            return User::isUserSuperAdministrador(Yii::$app->user->identity->id);
                        },
                    ],
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        'actions' =>  ['logout', 'create', 'delete'],
                        //Esta propiedad establece que tiene permisos
                        'allow' => true,
                        //Usuarios autenticados, el signo ? es para invitados
                        'roles' => ['@'],
                        //Este método nos permite crear un filtro sobre la identidad del usuario
                        //y así establecer si tiene permisos o no
                        'matchCallback' => function ($rule, $action) {
                            //Llamada al método que comprueba si es un administrador
                            return User::isUserAdministrador(Yii::$app->user->identity->id);
                        },
                    ],
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        'actions' =>  ['logout', 'create', 'delete'],
                        //Esta propiedad establece que tiene permisos
                        'allow' => true,
                        //Usuarios autenticados, el signo ? es para invitados
                        'roles' => ['@'],
                        //Este método nos permite crear un filtro sobre la identidad del usuario
                        //y así establecer si tiene permisos o no
                        'matchCallback' => function ($rule, $action) {
                            //Llamada al método que comprueba si es un administrador
                            return User::isUserDirector(Yii::$app->user->identity->id);
                        },
                    ],
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        'actions' =>  ['logout', 'create', 'delete'],
                        //Esta propiedad establece que tiene permisos
                        'allow' => true,
                        //Usuarios autenticados, el signo ? es para invitados
                        'roles' => ['@'],
                        //Este método nos permite crear un filtro sobre la identidad del usuario
                        //y así establecer si tiene permisos o no
                        'matchCallback' => function ($rule, $action) {
                            //Llamada al método que comprueba si es un administrador
                            return User::isUserDirectorSuplente(Yii::$app->user->identity->id);
                        },
                    ],
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        'actions' =>  ['logout', 'create', 'delete'],
                        //Esta propiedad establece que tiene permisos
                        'allow' => true,
                        //Usuarios autenticados, el signo ? es para invitados
                        'roles' => ['@'],
                        //Este método nos permite crear un filtro sobre la identidad del usuario
                        //y así establecer si tiene permisos o no
                        'matchCallback' => function ($rule, $action) {
                            //Llamada al método que comprueba si es un administrador
                            return User::isUserJefe(Yii::$app->user->identity->id);
                        },
                    ],
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        'actions' =>  ['logout', 'create', 'delete'],
                        //Esta propiedad establece que tiene permisos
                        'allow' => true,
                        //Usuarios autenticados, el signo ? es para invitados
                        'roles' => ['@'],
                        //Este método nos permite crear un filtro sobre la identidad del usuario
                        //y así establecer si tiene permisos o no
                        'matchCallback' => function ($rule, $action) {
                            //Llamada al método que comprueba si es un administrador
                            return User::isUserJefeSuplente(Yii::$app->user->identity->id);
                        },
                    ],
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        'actions' =>  ['logout', 'create', 'delete'],
                        //Esta propiedad establece que tiene permisos
                        'allow' => true,
                        //Usuarios autenticados, el signo ? es para invitados
                        'roles' => ['@'],
                        //Este método nos permite crear un filtro sobre la identidad del usuario
                        //y así establecer si tiene permisos o no
                        'matchCallback' => function ($rule, $action) {
                            //Llamada al método que comprueba si es un administrador
                            return User::isUserChofer(Yii::$app->user->identity->id);
                        },
                    ],
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        'actions' =>  ['logout', 'create', 'delete'],
                        //Esta propiedad establece que tiene permisos
                        'allow' => true,
                        //Usuarios autenticados, el signo ? es para invitados
                        'roles' => ['@'],
                        //Este método nos permite crear un filtro sobre la identidad del usuario
                        //y así establecer si tiene permisos o no
                        'matchCallback' => function ($rule, $action) {
                            //Llamada al método que comprueba si es un administrador
                            return User::isUserEncargado(Yii::$app->user->identity->id);
                        },
                    ],
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        'actions' =>  ['logout', 'create', 'delete'],
                        //Esta propiedad establece que tiene permisos
                        'allow' => true,
                        //Usuarios autenticados, el signo ? es para invitados
                        'roles' => ['@'],
                        //Este método nos permite crear un filtro sobre la identidad del usuario
                        //y así establecer si tiene permisos o no
                        'matchCallback' => function ($rule, $action) {
                            //Llamada al método que comprueba si es un administrador
                            return User::isUserFuncionario(Yii::$app->user->identity->id);
                        },
                    ],

                ],
            ],
            //Controla el modo en que se accede a las acciones, en este ejemplo a la acción logout
            //sólo se puede acceder a través del método post
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
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

        $destinos = new SqlDataProvider([
            'sql' => "select id_destino, nombre_region, numero_region, nombre_provincia, nombre_ciudad, nombre_sector from destino 
            join sector on sector.id_sector = destino.fk_id_sector 
            join ciudad on ciudad.id_ciudad = sector.fk_id_ciudad
            join provincia on provincia.id_provincia = ciudad.fk_id_provincia
            join region on region.id_region = provincia.fk_id_region
            where destino.fk_id_cometido = '$id_cometido'",
           
        ]);

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
            'destinos' => $destinos,
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
        $destino = Destino::findOne($id);

        $this->findModel($id)->delete();

        $msg = 'Destino Eliminado Corecctamente';
        return $this->redirect(['create', 'id_cometido' => $destino->fk_id_cometido, 'msg' => $msg]);
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
