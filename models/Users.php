<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $nombre
 * @property string $mail
 * @property int $rut
 * @property int $estado
 * @property int $grado
 * @property int $tipo_funcionario
 * @property int $role
 * @property int $fk_id_departamento
 *
 * @property Cometido[] $cometidos
 * @property Cometido[] $cometidos0
 * @property Departamento $fkIdDepartamento
 * @property Vehiculo[] $vehiculos
 * @property Viaje[] $viajes
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'mail', 'rut', 'estado', 'grado', 'tipo_funcionario', 'role', 'fk_id_departamento'], 'required'],
            [['rut', 'estado', 'grado', 'tipo_funcionario', 'role', 'fk_id_departamento'], 'integer'],
            [['nombre', 'mail'], 'string', 'max' => 100],
            [['fk_id_departamento'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['fk_id_departamento' => 'id_departamento']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'mail' => 'Mail',
            'rut' => 'Rut',
            'estado' => 'Estado',
            'grado' => 'Grado',
            'tipo_funcionario' => 'Tipo Funcionario',
            'role' => 'Role',
            'fk_id_departamento' => 'Fk Id Departamento',
        ];
    }

    /**
     * Gets query for [[Cometidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCometidos()
    {
        return $this->hasMany(Cometido::className(), ['fk_id' => 'id']);
    }

    /**
     * Gets query for [[Cometidos0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCometidos0()
    {
        return $this->hasMany(Cometido::className(), ['fk_id_director' => 'id']);
    }

    /**
     * Gets query for [[FkIdDepartamento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkIdDepartamento()
    {
        return $this->hasOne(Departamento::className(), ['id_departamento' => 'fk_id_departamento']);
    }

    /**
     * Gets query for [[Vehiculos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehiculos()
    {
        return $this->hasMany(Vehiculo::className(), ['fk_id' => 'id']);
    }

    /**
     * Gets query for [[Viajes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getViajes()
    {
        return $this->hasMany(Viaje::className(), ['fk_id' => 'id']);
    }
}
