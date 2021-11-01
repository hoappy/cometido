<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehiculo".
 *
 * @property int $id_vehiculo
 * @property string $patente
 * @property string $modelo
 * @property string $marca
 * @property int $tipo_combustible
 * @property string|null $num_chasis
 * @property int $estado
 * @property int $kilometraje
 * @property int $rendimiento
 * @property int $fk_id
 *
 * @property User $fk
 * @property Viaje[] $viajes
 */
class Vehiculo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehiculo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_vehiculo', 'patente', 'modelo', 'marca', 'tipo_combustible', 'estado', 'kilometraje', 'rendimiento', 'fk_id'], 'required'],
            [['id_vehiculo', 'tipo_combustible', 'estado', 'kilometraje', 'rendimiento', 'fk_id'], 'integer'],
            [['patente'], 'string', 'max' => 8],
            [['modelo', 'marca', 'num_chasis'], 'string', 'max' => 100],
            [['id_vehiculo'], 'unique'],
            [['fk_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['fk_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_vehiculo' => 'Id Vehiculo',
            'patente' => 'Patente',
            'modelo' => 'Modelo',
            'marca' => 'Marca',
            'tipo_combustible' => 'Tipo Combustible',
            'num_chasis' => 'Num Chasis',
            'estado' => 'Estado',
            'kilometraje' => 'Kilometraje',
            'rendimiento' => 'Rendimiento',
            'fk_id' => 'Fk ID',
        ];
    }

    /**
     * Gets query for [[Fk]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFk()
    {
        return $this->hasOne(User::className(), ['id' => 'fk_id']);
    }

    /**
     * Gets query for [[Viajes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getViajes()
    {
        return $this->hasMany(Viaje::className(), ['fk_id_vehiculo' => 'id_vehiculo']);
    }
}
