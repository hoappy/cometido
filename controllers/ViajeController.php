<?php

namespace app\controllers;

use app\models\Cometido;
use app\models\FormLlegada;
use app\models\Users;
use app\models\Vehiculo;
use app\models\Viaje;
use app\models\ViajeSearch;
use Yii;
use yii\data\SqlDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

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
        //return print_r(Viaje::find()->where(['id_viaje' => $id])->one());
        return $this->render('view', [
            'model' => Viaje::find()->where(['id_viaje' => $id])->one(),
        ]);
    }

    /**
     * Creates a new Viaje model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Viaje();

        $model->fk_id_cometido = $id;

        $cometido = Cometido::findOne($id);

        $user = ArrayHelper::getColumn(Viaje::find()
                            ->select(['viaje.fk_id as id'])
                            ->innerJoin('cometido', 'viaje.fk_id_cometido = cometido.id_cometido')
                            ->where(['>=', 'fecha_inicio', $cometido->fecha_inicio])
                            ->andWhere(['<=' , 'fecha_fin', $cometido->fecha_fin])
                            ->asArray()
                            ->all()
                    ,'id');

        $movil = ArrayHelper::getColumn(Viaje::find()
                            ->select(['viaje.fk_id_vehiculo as id_vehiculo'])
                            ->innerJoin('cometido', 'viaje.fk_id_cometido = cometido.id_cometido')
                            ->where(['>=', 'fecha_inicio', $cometido->fecha_inicio])
                            ->andWhere(['<=' , 'fecha_fin', $cometido->fecha_fin])
                            ->asArray()
                            ->all()
                    ,'id_vehiculo');

        //return print_r($user);

        $users = Users::find()->where(['=', 'role', '2'])->andWhere(['not in', 'id',  $user])->all();

        $movils = Vehiculo::find()->andWhere(['not in', 'id_vehiculo',  $movil])->all();

        //return print_r($users);

        if ($this->request->isPost) {

            $cometido = Cometido::findOne($model->fk_id_cometido);
            $cometido->estado = '4';


            if ($model->load($this->request->post()) && $cometido->update(false) && $model->save()) {
                return $this->redirect(['cometidos4']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'users' => $users,
            'movils' => $movils,
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

    public function actionSalida($id)
    {
        $model = Viaje::find()->where(['fk_id_cometido'=>$id])->one();

        //return print_r($model);

        if ($this->request->isPost) {

            $cometido = Cometido::findOne($model->fk_id_cometido);
            $cometido->estado = '5';

            if ($model->load($this->request->post()) && $cometido->update(false) && $model->save()) {
                return $this->redirect(['cometidos1']);
            }
        }

        return $this->render('salida', [
            'model' => $model,
        ]);
    }

    public function actionLlegada($id)
    {
        $model = new FormLlegada();

        $model->id_viaje = $id;
        //return print_r($model); 

        if ($this->request->isPost) {

            if ($model->load($this->request->post())){

                //return print_r($model);

                $table = Viaje::find()->where(['fk_id_cometido'=>$model->id_viaje])->one();

                $cometido = Cometido::findOne($table->fk_id_cometido);
                $cometido->estado = '6';

                $table->kilometros_total = ($model->kilometros_llegada - $table->kilometros_salida);

                $table->kilometros_llegada = $model->kilometros_llegada;
                $table->hora_llegada = $model->hora_llegada;
                $table->combustible_litros = $model->combustible_litros;
                $table->combustible_pesos = $model->combustible_pesos;
                $table->observaciones = $model->observaciones;

                //return print_r($table);

                if ($cometido->update(false) && $table->save()) {
                    return $this->redirect(['cometidos2']);
                }
            }
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
            where estado >= 3 and estado <= 6 and (tranporte_ida = 0 or transporte_regreso = 0)",
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
            where estado = 4 and (tranporte_ida = 0 or transporte_regreso = 0)",
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
            where estado = 5 and (tranporte_ida = 0 or transporte_regreso = 0)",
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
            where estado = 6 and (tranporte_ida = 0 or transporte_regreso = 0)",
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
            where (tranporte_ida = 0 or transporte_regreso = 0) and estado = 3",
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionDenegar()
    {
        $table = new Cometido;
        $msg = null;
        
        if (Yii::$app->request->get()) {

            //Obtenemos el valor de los parámetros get
            $id = Html::encode($_GET["id"]);

            if ((int)$id) {
                //Realizamos la consulta para obtener el registro
                $model = $table
                    ->find()
                    ->where("id_cometido=:id", [":id" => $id]);

                //Si el registro existe
                if ($model->count() == 1) {
                    $estado = Cometido::findOne($id);
                    $estado->estado = 10;
                    if ($estado->update()) {
                        //$msg = "La cancelacion del usuario fue llevado a cabo correctamente";
                        return $this->redirect(["viaje/cometidos4"]);
                        //return $this->actionView($id);
                    } else {
                        //$msg = "Ha ocurrido un error al realizar la cancelqacion";
                        return $this->redirect(["viaje/cometidos4"]);
                        //return $this->actionView($id);
                    }
                } else //Si no existe redireccionamos a login
                {
                    return $this->redirect(["viaje/cometidos4"]);
                }
            } else //Si id no es un número entero redireccionamos a login
            {
                return $this->redirect(["viaje/cometidos4"]);
            }
        }
    }
}
