<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cometido".
 *
 * @property int $id_cometido
 * @property int $con_viatico
 * @property int $dias_sin_pernoctar
 * @property int $dias_con_pernoctar
 * @property int $monto
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $hora_inicio
 * @property string $hora_fin
 * @property string $motivo_cometido
 * @property int $tranporte_ida
 * @property int $transporte_regreso
 * @property int $estado
 * @property string|null $descreipcion
 * @property int $fk_id_item
 * @property int $fk_id
 * @property int $fk_id_director
 *
 * @property Destino[] $destinos
 * @property User $fk
 * @property User $fkIdDirector
 * @property ItemPresupuestario $fkIdItem
 * @property ModificacionComitido[] $modificacionComitidos
 * @property Viaje[] $viajes
 */
class Cometido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cometido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['con_viatico', 'dias_sin_pernoctar', 'dias_con_pernoctar', 'monto', 'fecha_inicio', 'fecha_fin', 'hora_inicio', 'hora_fin', 'motivo_cometido', 'tranporte_ida', 'transporte_regreso', 'estado', 'fk_id_item', 'fk_id'], 'required'],
            [['con_viatico', 'dias_sin_pernoctar', 'dias_con_pernoctar', 'monto', 'tranporte_ida', 'transporte_regreso', 'estado', 'fk_id_item', 'fk_id', 'fk_id_director'], 'integer'],
            [['fecha_inicio', 'fecha_fin', 'hora_inicio', 'hora_fin'], 'safe'],
            [['motivo_cometido', 'descreipcion'], 'string', 'max' => 100],
            [['fk_id_item'], 'exist', 'skipOnError' => true, 'targetClass' => ItemPresupuestario::className(), 'targetAttribute' => ['fk_id_item' => 'id_item']],
            [['fk_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['fk_id' => 'id']],
            [['fk_id_director'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['fk_id_director' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cometido' => 'Id Cometido',
            'con_viatico' => 'Con Viatico',
            'dias_sin_pernoctar' => 'Dias Sin Pernoctar',
            'dias_con_pernoctar' => 'Dias Con Pernoctar',
            'monto' => 'Monto',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'hora_inicio' => 'Hora Inicio',
            'hora_fin' => 'Hora Fin',
            'motivo_cometido' => 'Motivo Cometido',
            'tranporte_ida' => 'Tranporte Ida',
            'transporte_regreso' => 'Transporte Regreso',
            'estado' => 'Estado',
            'descreipcion' => 'Descreipcion',
            'fk_id_item' => 'Seleccione Item Presupuestario',
            'fk_id' => 'Fk ID',
            'fk_id_director' => 'Fk Id Director',
        ];
    }

    /**
     * Gets query for [[Destinos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDestinos()
    {
        return $this->hasMany(Destino::className(), ['fk_id_cometido' => 'id_cometido']);
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
     * Gets query for [[FkIdDirector]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkIdDirector()
    {
        return $this->hasOne(User::className(), ['id' => 'fk_id_director']);
    }

    /**
     * Gets query for [[FkIdItem]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkIdItem()
    {
        return $this->hasOne(ItemPresupuestario::className(), ['id_item' => 'fk_id_item']);
    }

    /**
     * Gets query for [[ModificacionComitidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModificacionComitidos()
    {
        return $this->hasMany(ModificacionComitido::className(), ['fk_id_cometido' => 'id_cometido']);
    }

    /**
     * Gets query for [[Viajes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getViajes()
    {
        return $this->hasMany(Viaje::className(), ['fk_id_cometido' => 'id_cometido']);
    }
}
