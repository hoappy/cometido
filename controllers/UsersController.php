<?php

namespace app\controllers;

use app\models\Users;
use app\models\User;
use app\models\FormUserUpdate;
use app\models\UsersSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
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
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionVieww($id, $msg)
    {

        return $this->render('view', [
            'model' => $this->findModel($id), "msg" => $msg,
        ]);
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = new FormUserUpdate;
        $msg = null;

        if($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $table = Users::findOne($id);
                if($table)
                {
                    $table->email = $model->email;
                    $table->grado = $model->grado;
                    $table->tipo_funcionario = $model->tipo_funcionario;
                    $table->role = $model->role;
                    $table->fk_id_departamento = $model->fk_id_departamento;
                    
                    if ($table->update())
                    {
                        $msg = "El Usuario ha sido actualizado correctamente";
                        $this->redirect(['vieww', 'id' => $id, "msg" => $msg]);
                    }
                    else
                    {
                        $msg = "El Usuario no ha podido ser actualizado: Se han ingresado los mismos parametros o se produjo un error";
                    }
                }
                else
                {
                    $msg = "El Usuario seleccionado no ha sido encontrado";
                }
            }
            else
            {
                $model->getErrors();
            }
        }
        
        
        if (Yii::$app->request->get("id"))
        {
            $id = Html::encode($_GET["id"]);
            if ((int) $id)
            {
                $table = Users::findOne($id);
                if($table)
                {
                    $model->id = $table->id;
                    $model->nombre = $table->nombre;
                    $model->grado = $table->grado;
                    $model->fk_id_departamento = $table->fk_id_departamento;
                    $model->rut = $table->rut;
                    $model->email = $table->email;
                    $model->tipo_funcionario = $table->tipo_funcionario;
                    $model->role = $table->role;
                }
                else
                {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
            else
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        else
        {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render("update", ["model" => $model, "msg" => $msg]);
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
