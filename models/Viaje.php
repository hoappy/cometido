<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "viaje".
 *
 * @property int $id_viaje
 * @property string $hora_salida
 * @property string|null $hora_llegada
 * @property int|null $combustible_litros
 * @property int|null $combustible_pesos
 * @property int|null $kilometros_salida
 * @property int|null $kilometros_llegada
 * @property int|null $kilometros_total
 * @property int $estado
 * @property string $observaciones
 * @property int $fk_id_vehiculo
 * @property int $fk_id_cometido
 * @property int $fk_id
 *
 * @property User $fk
 * @property Cometido $fkIdCometido
 * @property Vehiculo $fkIdVehiculo
 */
class Viaje extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'viaje';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_id','fk_id_vehiculo', 'fk_id_cometido'], 'required'],
            [['hora_salida', 'hora_llegada'], 'safe'],
            [['combustible_litros', 'combustible_pesos', 'kilometros_salida', 'kilometros_llegada', 'kilometros_total', 'estado', 'fk_id_vehiculo', 'fk_id_cometido', 'fk_id'], 'integer'],
            [['observaciones'], 'string', 'max' => 100],
            [['fk_id_cometido'], 'exist', 'skipOnError' => true, 'targetClass' => Cometido::className(), 'targetAttribute' => ['fk_id_cometido' => 'id_cometido']],
            [['fk_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['fk_id' => 'id']],
            [['fk_id_vehiculo'], 'exist', 'skipOnError' => true, 'targetClass' => Vehiculo::className(), 'targetAttribute' => ['fk_id_vehiculo' => 'id_vehiculo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_viaje' => 'Id Viaje',
            'hora_salida' => 'Hora Salida',
            'hora_llegada' => 'Hora Llegada',
            'combustible_litros' => 'Combustible Litros',
            'combustible_pesos' => 'Combustible Pesos',
            'kilometros_salida' => 'Kilometros Salida',
            'kilometros_llegada' => 'Kilometros Llegada',
            'kilometros_total' => 'Kilometros Total',
            'estado' => 'Estado',
            'observaciones' => 'Observaciones',
            'fk_id_vehiculo' => 'Vehiculo',
            'fk_id_cometido' => 'Cometido',
            'fk_id' => 'Chofer',
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
     * Gets query for [[FkIdCometido]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkIdCometido()
    {
        return $this->hasOne(Cometido::className(), ['id_cometido' => 'fk_id_cometido']);
    }

    /**
     * Gets query for [[FkIdVehiculo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkIdVehiculo()
    {
        return $this->hasOne(Vehiculo::className(), ['id_vehiculo' => 'fk_id_vehiculo']);
    }
}
