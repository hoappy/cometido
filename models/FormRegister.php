<?php

namespace app\models;

use Yii;
use yii\base\model;
use app\models\Usuario;

class FormRegister extends model
{

    //public $username;
    public $email;
    public $password;
    public $password_repeat;

    public $role;
    public $rut;
    public $nombres;
    public $apellidoA;
    public $apellidoM;
    public $telefono;
    public $direccion;

    public function rules()
    {
        return [
            [['rut','role', 'nombres', 'apellidoA', 'apellidoM', 'telefono', 'direccion',/*'username',*/ 'email', 'password', 'password_repeat'], 'required', 'message' => 'Campo requerido'],
            //['username', 'match', 'pattern' => "/^.{3,50}$/", 'message' => 'Mínimo 3 y máximo 50 caracteres'],
            //['username', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y números'],
            
            ['rut', 'match', 'pattern' => "/^[0-9k]+$/i", 'message' => 'Ingrese el Rut sin puntos ni guion con el digito verificador'],
            ['rut', 'match', 'pattern' => "/^.{9,10}$/", 'message' => 'Formato: 22333444-5'],
            ['telefono', 'match', 'pattern' => "/^.{9,9}$/", 'message' => 'ingrese los ultimos 9 digitos'],
            ['telefono', 'match', 'pattern' => "/^[0-9]+$/i", 'message' => 'Solo se aceptan numeros'],
            
            [['nombres', 'apellidoA', 'apellidoM'], 'string'],
            [['direccion'], 'string', 'max' => 30],
            [['role', 'telefono'], 'integer'],

            ['rut', 'rut_existe'],

            //['rut', 'rut'],
            ['email', 'match', 'pattern' => "/^.{5,80}$/", 'message' => 'Mínimo 5 y máximo 80 caracteres'],
            ['email', 'email', 'message' => 'Formato no válido'],
            ['email', 'email_existe'],
            ['password', 'match', 'pattern' => "/^.{8,16}$/", 'message' => 'Mínimo 6 y máximo 16 caracteres'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => 'Los passwords no coinciden'],
        ];
    }

    public function email_existe($attribute, $params)
    {

        //Buscar el email en la tabla
        $table = Usuario::find()->where("email=:email", [":email" => $this->email]);

        //Si el email existe mostrar el error
        if ($table->count() == 1) {
            $this->addError($attribute, "El email seleccionado existe");
        }
    }

    /*public function username_existe($attribute, $params)
    {
        //Buscar el username en la tabla
        $table = Usuario::find()->where("username=:username", [":username" => $this->username]);

        //Si el username existe mostrar el error
        if ($table->count() == 1) {
            $this->addError($attribute, "El usuario seleccionado existe");
        }
    }*/

    public function rut_existe($attribute, $params)
    {
        //Buscar el rut en la tabla
        $table = Usuario::find()->where("rut=:rut", [":rut" => $this->rut]);

        //Si el rut existe mostrar el error
        if ($table->count() == 1) {
            $this->addError($attribute, "El rut seleccionado ya esta registrado");
        }
    }

}