<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{

    public $id;
    //public $username;
    public $email;
    public $password;
    public $authKey;
    public $accessToken;
    public $activate;
    public $role;
    public $rut;
    public $nombre;
    public $tipo_funcionario;
    public $fk_id_departamento;
    public $grado;
    public $estado;

    public $verification_code;

    public static function getDb()
    {
        return Yii::$app->db;
    }

    public static function tableName()
    {
        return 'users';
    }

    /* busca la identidad del usuario a través de su $id */

    public static function findIdentity($id)
    {

        $user = Users::find()
            ->where("activate=:activate", [":activate" => 1])
            ->andWhere("estado=:estado", [":estado" => 1])
            ->andWhere("id=:id", ["id" => $id])
            ->one();

        return isset($user) ? new static($user) : null;
    }

    /**
     * @inheritdoc
     */

    /* Busca la identidad del usuario a través de su token de acceso */
    public static function findIdentityByAccessToken($token, $type = null)
    {

        $Usuario = Users::find()
            ->where("activate=:activate", [":activate" => 1])
            ->andWhere("estado=:estado", [":estado" => 1])
            ->andWhere("accessToken=:accessToken", [":accessToken" => $token])
            ->all();

        foreach ($Usuario as $Usuario) {
            if ($Usuario->accessToken === $token) {
                return new static($Usuario);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param  string $username
     * @return static|null
     */

    /* Busca la identidad del usuario a través del username */
    public static function findByRut($rut)
    {
        $Usuario = Users::find()
            ->where("activate=:activate", ["activate" => 1])
            ->andWhere("estado=:estado", [":estado" => 1])
            ->andWhere("rut=:rut", [":rut" => $rut])
            ->all();

        foreach ($Usuario as $Usuario) {
            if (strcasecmp($Usuario->rut, $rut) === 0) {
                return new static($Usuario);
            }
        }

        return null;
    }

    /**
     * @inheritdoc
     */

    /* Regresa el id del usuario */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */

    /* Regresa la clave de autenticación */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */

    /* Valida la clave de autenticación */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        /* Valida el password */
        if (crypt($password, $this->password) == $this->password) {
            return $password === $password;
        }
    }

    public static function getUsuarios($role)
    {
        $query = (new \yii\db\Query())
            -> select('*')
            ->from('usuario')
            ->where("activate=:activate", ["activate" => 1])
            ->andWhere("role=:role", ["role" => $role]);
            
        return $query;
    }

    public static function usuarioActivo($id)
    {

        $boolean = Users::findOne($id);

        if ($boolean->activate == 1){
            return true;
        }else{
            return false;
        }
       
    }

    public static function isUserFuncionario($id)
    {
        if (Users::findOne(['id' => $id, 'activate' => '1', 'estado' => '1', 'role' => 0])){
            return true;
        } else {

            return false;
        }

    }

    public static function isUserEncargado($id)
    {
        if (Users::findOne(['id' => $id, 'activate' => '1', 'estado' => '1', 'role' => 1])){
            return true;
        } else {

            return false;
        }
    }

    public static function isUserChofer($id)
    {
        if (Users::findOne(['id' => $id, 'activate' => '1', 'estado' => '1', 'role' => 2])){
            return true;
        } else {

            return false;
        }

    }

    public static function isUserJefe($id)
    {
        if (Users::findOne(['id' => $id, 'activate' => '1', 'estado' => '1', 'role' => 4])){
            return true;
        } else {

            return false;
        }

    }
    public static function isUserJefeSuplente($id)
    {
        if (Users::findOne(['id' => $id, 'activate' => '1', 'estado' => '1', 'role' => 3])){
            return true;
        } else {

            return false;
        }

    }

    public static function isUserDirector($id)
    {
        if (Users::findOne(['id' => $id, 'activate' => '1', 'estado' => '1', 'role' => 6])){
            return true;
        } else {

            return false;
        }

    }
    public static function isUserDirectorSuplente($id)
    {
        if (Users::findOne(['id' => $id, 'activate' => '1', 'estado' => '1', 'role' => 5])){
            return true;
        } else {

            return false;
        }

    }
    
    public static function isUserAdministrador($id)
    {
        if (Users::findOne(['id' => $id, 'activate' => '1', 'estado' => '1', 'role' => 7])){
            return true;
        } else {

            return false;
        }

    }
}
