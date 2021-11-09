<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $nombre
 * @property string $email
 * @property int $rut
 * @property int $estado
 * @property int $grado
 * @property int $tipo_funcionario
 * @property int $role
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 * @property int $activate
 * @property int $fk_id_departamento
 *
 * @property Cometido[] $cometidos
 * @property Cometido[] $cometidos0
 * @property Cometido[] $cometidos1
 * @property Departamento $fkIdDepartamento
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
            [['nombre', 'email', 'rut', 'estado', 'grado', 'tipo_funcionario', 'role', 'password', 'authKey', 'accessToken', 'fk_id_departamento'], 'required'],
            [['rut', 'estado', 'grado', 'tipo_funcionario', 'role', 'activate', 'fk_id_departamento'], 'integer'],
            [['nombre', 'email'], 'string', 'max' => 100],
            [['password', 'authKey', 'accessToken'], 'string', 'max' => 250],
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
            'email' => 'Correo Electronico',
            'rut' => 'Rut',
            'estado' => 'Estado',
            'grado' => 'Grado',
            'tipo_funcionario' => 'Tipo Funcionario',
            'role' => 'Nivel de Usuario',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'activate' => 'Activate',
            'fk_id_departamento' => 'Departamento',
        ];
    }

    /**
     * Gets query for [[Cometidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCometidos()
    {
        return $this->hasMany(Cometido::className(), ['fk_id_director' => 'id']);
    }

    /**
     * Gets query for [[Cometidos0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCometidos0()
    {
        return $this->hasMany(Cometido::className(), ['fk_id_funcionario' => 'id']);
    }

    /**
     * Gets query for [[Cometidos1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCometidos1()
    {
        return $this->hasMany(Cometido::className(), ['fk_id_jefe' => 'id']);
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
     * Gets query for [[Viajes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getViajes()
    {
        return $this->hasMany(Viaje::className(), ['fk_id' => 'id']);
    }

    public function dv($r){
        $s = 1;
        for ($m = 0; $r != 0; $r /= 10)
            $s = ($s + $r % 10 * (9 - $m++ % 6)) % 11;
        return chr($s ? $s + 47 : 75);
    }
}
