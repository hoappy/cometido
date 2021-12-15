<?php

namespace app\controllers;

use app\models\Cometido;
//use app\models\Destinos;
use app\models\CometidoSearch;
use app\models\Departamento;
use app\models\Destino;
use app\models\FormMonto;
use app\models\ItemPresupuestario;
use app\models\Users;
use Yii;
use yii\data\SqlDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;

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
        $model = new SqlDataProvider([
            'sql' => 'select * from cometido 
            where fk_id_funcionario = ' . Yii::$app->user->identity->id,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $model,
        ]);
    }

    //cometidos por autorizar
    public function actionIndex2()
    {
        $model = new SqlDataProvider([
            'sql' => 'select * from cometido
            where cometido.estado = 1',
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('director', [
            'dataProvider' => $model,
        ]);
    }

    //cometidos por aprobar
    public function actionIndex3()
    {
        $model = new SqlDataProvider([
            'sql' => 'select cometido.estado, cometido.transporte_regreso, cometido.tranporte_ida, cometido.fecha_fin, cometido.fecha_inicio, cometido.fk_id_funcionario, cometido.id_cometido 
            from cometido join user on cometido.fk_id_funcionario = user.id
            where cometido.estado = 0 and user.fk_id_departamento = ' . Yii::$app->user->identity->fk_id_departamento,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('jefe', [
            'dataProvider' => $model,
        ]);
    }

    //cometidos ya aprobados
    public function actionIndex4()
    {
        $model = new SqlDataProvider([
            'sql' => 'select cometido.monto, cometido.estado, cometido.transporte_regreso, cometido.tranporte_ida, cometido.fecha_fin, cometido.fecha_inicio, cometido.fk_id_funcionario, cometido.id_cometido 
            from cometido join user on cometido.fk_id_funcionario = user.id
            where cometido.estado > 0 and user.fk_id_departamento = ' . Yii::$app->user->identity->fk_id_departamento,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('jefe', [
            'dataProvider' => $model,
        ]);
    }

    //cometidos ya autorizados
    public function actionIndex5()
    {
        $model = new SqlDataProvider([
            'sql' => 'select * from cometido
            where cometido.estado > 1',
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('director', [
            'dataProvider' => $model,
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

        $cometido->fecha_fin = date("d/m/Y", strtotime($cometido->fecha_fin));
        $cometido->fecha_inicio = date("d/m/Y", strtotime($cometido->fecha_inicio));

        $funcionario = Users::findOne($cometido->fk_id_funcionario);
        $departamento = Departamento::findOne($funcionario->fk_id_departamento);
        /*$jefe = Users::findOne([
            'fk_id_departamento'=>$funcionario->fk_id_departamento, 
            //agregar relacion entre cometido u usuario para ver la relacion entre jefe o jefe suplente
            'role' => '4'  // el rol 4 es jefe de departamento
        ]); */ //consulta antes de modificar la BDD
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

        $model->fk_id_funcionario = Yii::$app->user->identity->id;

        $model->estado = 0;

        $model->monto = null;



        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['destino/create', 'id_cometido' => $model->id_cometido, 'msg' => '']);
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

    public function actionCancelar()
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
                    $estado->estado = 9;
                    if ($estado->update()) {
                        $msg = "La cancelacion del usuario fue llevado a cabo correctamente";
                        return $this->redirect(["cometido/index1"]);
                        //return $this->actionView($id);
                    } else {
                        $msg = "Ha ocurrido un error al realizar la cancelqacion";
                        return $this->redirect(["cometido/index1"]);
                        //return $this->actionView($id);
                    }
                } else //Si no existe redireccionamos a login
                {
                    return $this->redirect(["cometido/index1"]);
                }
            } else //Si id no es un número entero redireccionamos a login
            {
                return $this->redirect(["cometido/index1"]);
            }
        }
    }

    public function actionAceptar()
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
                    $estado->estado = 1;
                    $estado->fk_id_jefe = Yii::$app->user->identity->id;
                    if ($estado->update()) {
                        //$msg = "La cancelacion del usuario fue llevado a cabo correctamente";
                        return $this->redirect(["cometido/index3"]);
                        //return $this->actionView($id);
                    } else {
                        //$msg = "Ha ocurrido un error al realizar la cancelqacion";
                        return $this->redirect(["cometido/index3"]);
                        //return $this->actionView($id);
                    }
                } else //Si no existe redireccionamos a login
                {
                    return $this->redirect(["cometido/index3"]);
                }
            } else //Si id no es un número entero redireccionamos a login
            {
                return $this->redirect(["cometido/index3"]);
            }
        }
    }

    public function actionRechazar()
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
                    $estado->estado = 7;
                    //$estado->fk_id_jefe = Yii::$app->user->identity->id;
                    if ($estado->update()) {
                        //$msg = "La cancelacion del usuario fue llevado a cabo correctamente";
                        return $this->redirect(["cometido/index3"]);
                        //return $this->actionView($id);
                    } else {
                        //$msg = "Ha ocurrido un error al realizar la cancelqacion";
                        return $this->redirect(["cometido/index3"]);
                        //return $this->actionView($id);
                    }
                } else //Si no existe redireccionamos a login
                {
                    return $this->redirect(["cometido/index3"]);
                }
            } else //Si id no es un número entero redireccionamos a login
            {
                return $this->redirect(["cometido/index3"]);
            }
        }
    }

    public function actionAutorizar()
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
                    if ($estado->tranporte_ida == '0' || $estado->transporte_regreso == '0') {
                        $estado->estado = 3;
                    } else {
                        $estado->estado = 2;
                    }
                    $estado->fk_id_director = Yii::$app->user->identity->id;
                    if ($estado->update()) {
                        //$msg = "La cancelacion del usuario fue llevado a cabo correctamente";
                        return $this->redirect(["cometido/index2"]);
                        //return $this->actionView($id);
                    } else {
                        //$msg = "Ha ocurrido un error al realizar la cancelqacion";
                        return $this->redirect(["cometido/index2"]);
                        //return $this->actionView($id);
                    }
                } else //Si no existe redireccionamos a login
                {
                    return $this->redirect(["cometido/index2"]);
                }
            } else //Si id no es un número entero redireccionamos a login
            {
                return $this->redirect(["cometido/index2"]);
            }
        }
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
                    $estado->estado = 8;
                    if ($estado->update()) {
                        //$msg = "La cancelacion del usuario fue llevado a cabo correctamente";
                        return $this->redirect(["cometido/index2"]);
                        //return $this->actionView($id);
                    } else {
                        //$msg = "Ha ocurrido un error al realizar la cancelqacion";
                        return $this->redirect(["cometido/index2"]);
                        //return $this->actionView($id);
                    }
                } else //Si no existe redireccionamos a login
                {
                    return $this->redirect(["cometido/index2"]);
                }
            } else //Si id no es un número entero redireccionamos a login
            {
                return $this->redirect(["cometido/index2"]);
            }
        }
    }

    public function actionMonto($id)
    {
        $model = new FormMonto();

        $cometido = Cometido::find()->where(['id_cometido' => $id])->one();
        $item = ItemPresupuestario::findOne($cometido->fk_id_item);
        $funcionario = Users::findOne($cometido->fk_id_funcionario);
        $departamento = Departamento::findOne($funcionario->fk_id_departamento);


        $model->id_cometido = $id;
        //return print_r($model); 

        if ($this->request->isPost) {

            if ($model->load($this->request->post())) 
            {

                //return print_r($model);

                $table = Cometido::find()->where(['id_cometido' => $model->id_cometido])->one();

                if ($table->estado == '2')
                {
                    $table->estado = '6';
                }

                $table->monto = $model->monto;

                //return print_r($table);

                if ($table->save()) {
                    return $this->redirect(["cometido/index4"]);
                }
            }
        }

        return $this->render('monto', [
            'model' => $model,
            'cometido' => $cometido,
            'item' => $item,
            'funcionario' => $funcionario,
            'departamento' => $departamento,
        ]);

    }
}
