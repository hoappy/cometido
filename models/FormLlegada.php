<?php

namespace app\models;

use Yii;
use yii\base\Model;

class FormLlegada extends Model
{
    public $kilometros_llegada;
    public $hora_llegada;
    public $combustible_litros;
    public $combustible_pesos;
    public $id_viaje;
    public $observaciones;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ciudad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['observaciones','kilometros_llegada', 'hora_llegada', 'combustible_litros', 'combustible_pesos', 'id_viaje'], 'required'],
            [['kilometros_llegada', 'combustible_litros', 'combustible_pesos'], 'integer'],
            ['hora_llegada', 'time'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kilometros_llegada' => 'Kilometros Llegada',
            'hora_llegada' => 'Hora Llegada',
            'combustible_litros' => 'Combustible en Pesos',
            'combustible_litros' => 'Combustible en Litros',
            'observaciones' => 'Observaciones',
        ];
    }

}