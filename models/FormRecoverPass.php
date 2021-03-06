<?php
 
namespace app\models;
use Yii;
use yii\base\Model;
 
class FormRecoverPass extends Model{
 
    public $email;
     
    public function rules()
    {
        return [
            ['email', 'required', 'message' => 'Campo requerido'],
            ['email', 'match', 'pattern' => "/^.{5,80}$/", 'message' => 'Mínimo 5 y máximo 80 caracteres'],
            ['email', 'email', 'message' => 'Formato no válido'],
        ];
    }

    public function attributeLabels()
    {
        return [
            
            'email' => 'Ingrese Su Correo Electronico',
            
        ];
    }
}