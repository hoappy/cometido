<?php

namespace app\models;

use Yii;
use yii\base\model;
use app\models\Users;

class FormUserUpdate extends model
{

    public  $id;

    public $email;

    public $role;
    public $grado;
    public $tipo_funcionario;
    public $fk_id_departamento;

    public $rut;
    public $nombre;


    public function rules()
    {
        return [
            [['role','grado', 'fk_id_departamento', 'tipo_funcionario', 'email'], 'required', 'message' => 'Campo requerido'],

            ['email', 'match', 'pattern' => "/^.{5,80}$/", 'message' => 'Mínimo 5 y máximo 80 caracteres'],
            ['email', 'email', 'message' => 'Formato no válido'],
            //['email', 'email_existe'],

        ];
    }

    public function email_existe($attribute, $params)
    {

        //Buscar el email en la tabla
        $table = Users::find()->where("email=:email", [":email" => $this->email]);

        //Si el email existe mostrar el error
        if ($table->count() == 1) {
            $this->addError($attribute, "El email seleccionado existe");
        }
    }

}
