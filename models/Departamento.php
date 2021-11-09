<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departamento".
 *
 * @property int $id_departamento
 * @property string $nombre
 * @property int $cant_funcionarios
 * @property int $piso
 * @property int $estado
 *
 * @property User[] $users
 */
class Departamento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'cant_funcionarios', 'piso'], 'required'],
            [['cant_funcionarios', 'piso', 'estado'], 'integer'],
            [['nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_departamento' => 'Id Departamento',
            'nombre' => 'Nombre',
            'cant_funcionarios' => 'Cantidad de Funcionarios',
            'piso' => 'Piso',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['fk_id_departamento' => 'id_departamento']);
    }
}
