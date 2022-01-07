<?php

namespace app\controllers;

use app\models\ItemPresupuestario;
use app\models\ItemPresupuestarioSearch;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;

/**
 * ItemPresupuestarioController implements the CRUD actions for ItemPresupuestario model.
 */
class ItemPresupuestarioController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'index', 'create', 'update', 'view', 'delete'],
                'rules' => [
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        'actions' => ['logout', 'index', 'update', 'view', 'create', 'delete'],
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
                        'actions' => ['logout', 'index', 'update', 'view', 'create', 'delete'],
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
     * Lists all ItemPresupuestario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ItemPresupuestarioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ItemPresupuestario model.
     * @param int $id_item Nombre Item Presupuestario
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
     * Creates a new ItemPresupuestario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ItemPresupuestario();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_item]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ItemPresupuestario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_item Nombre Item Presupuestario
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_item]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ItemPresupuestario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_item Nombre Item Presupuestario
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $table = new ItemPresupuestario;
        $msg = null;

        if (Yii::$app->request->get()) {

            //Obtenemos el valor de los parámetros get
            $id = Html::encode($_GET["id"]);

            if ((int)$id) {
                //Realizamos la consulta para obtener el registro
                $model = $table
                    ->find()
                    ->where("id_item=:id", [":id" => $id]);

                //Si el registro existe
                if ($model->count() == 1) {
                    $estado = ItemPresupuestario::findOne($id);
                    $estado->estado = 0;
                    if ($estado->update()) {
                        //$msg = "La cancelacion del usuario fue llevado a cabo correctamente";
                        return $this->redirect(["item-presupuestario/index"]);
                        //return $this->actionView($id);
                    } else {
                        //$msg = "Ha ocurrido un error al realizar la cancelqacion";
                        return $this->redirect(["item-presupuestario/index"]);
                        //return $this->actionView($id);
                    }
                } else //Si no existe redireccionamos a login
                {
                    return $this->redirect(["item-presupuestario/index"]);
                }
            } else //Si id no es un número entero redireccionamos a login
            {
                return $this->redirect(["item-presupuestario/index"]);
            }
        }
    }

    /**
     * Finds the ItemPresupuestario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_item Nombre Item Presupuestario
     * @return ItemPresupuestario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ItemPresupuestario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
