<?php

namespace app\models;

use Yii;

class FormMonto extends \yii\db\ActiveRecord
{
    public $id_cometido;
    public $monto;

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
            [['id_cometido', 'monto'], 'required'],
            [['monto'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'monto' => 'Ingrese Un Monto para el Viatico del Cometido Seleccionado',
        ];
    }

}
