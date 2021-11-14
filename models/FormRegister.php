<?php

namespace app\models;

use Yii;
use yii\base\model;
use app\models\Usuario;

class FormRegister extends model
{
    public $email;
    public $password;
    public $password_repeat;

    public $rut;

    public $role;
    public $nombre;
    public $grado;
    public $tipo_funcionario;
    public $fk_id_departamento;


    public function rules()
    {
        return [
            [['rut', 'role', 'nombre', 'grado', 'fk_id_departamento', 'tipo_funcionario',/*'username',*/ 'email', 'password', 'password_repeat'], 'required', 'message' => 'Campo requerido'],
            //['username', 'match', 'pattern' => "/^.{3,50}$/", 'message' => 'Mínimo 3 y máximo 50 caracteres'],
            //['username', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y números'],
            ['rut', 'match', 'pattern' => "/^[0-9]+$/i", 'message' => 'Ingrese el Rut sin puntos ni guion y sin digito verificador'],
            ['rut', 'match', 'pattern' => "/^.{7,8}$/", 'message' => 'Formato: 22333444 o 1333444'],
            [['nombre'], 'string'],
            [['role'], 'integer'],
            ['rut', 'valida_rut'],
            ['email', 'email_existe'],
            ['rut', 'rut_existe'],

            //['rut', 'rut'],
            ['email', 'match', 'pattern' => "/^.{5,80}$/", 'message' => 'Mínimo 5 y máximo 80 caracteres'],
            ['email', 'email', 'message' => 'Formato no válido'],

            ['password', 'match', 'pattern' => "/^.{8,16}$/", 'message' => 'Mínimo 6 y máximo 16 caracteres'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => 'Los passwords no coinciden'],
        ];
    }

    public function email_existe($attribute, $params)
    {

        //Buscar el email en la tabla
        $table = Users::find()->where("email=:email", [":email" => $this->email]);

        //Si el email existe mostrar el error
        if ($table->count() >= 1) {
            $this->addError($attribute, "El email seleccionado existe");
        }
    }

    public function rut_existe($attribute, $params)
    {
        //Buscar el rut en la tabla
        $table = Users::find()->where("rut=:rut", [":rut" => $this->rut]);

        //Si el rut existe mostrar el error
        if ($table->count() == 1) {
            $this->addError($attribute, "El rut seleccionado ya esta registrado");
        }
    }

    public function valida_rut($attribute)
    {
        $dv  = Users::dv($this->rut);

        if ($dv == 'k' || $dv <= 9 || $dv >= 0) {
            
        }else{
            $this->addError($attribute, "Rut ingresado es Invalido " . $dv);
        }
    }
}
