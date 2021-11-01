<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "modificacion_comitido".
 *
 * @property int $id_modificacion
 * @property string|null $fecha_fin
 * @property string|null $hora_fin
 * @property int|null $transporte_regreso
 * @property int|null $transporte_ida
 * @property int|null $con_viatico
 * @property int|null $dias_sin_pernoctar
 * @property int|null $dias_con_pernoctar
 * @property int $estado
 * @property int $fk_id_cometido
 *
 * @property Cometido $fkIdCometido
 */
class ModificacionComitido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'modificacion_comitido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_fin', 'hora_fin'], 'safe'],
            [['transporte_regreso', 'transporte_ida', 'con_viatico', 'dias_sin_pernoctar', 'dias_con_pernoctar', 'estado', 'fk_id_cometido'], 'integer'],
            [['estado', 'fk_id_cometido'], 'required'],
            [['fk_id_cometido'], 'exist', 'skipOnError' => true, 'targetClass' => Cometido::className(), 'targetAttribute' => ['fk_id_cometido' => 'id_cometido']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_modificacion' => 'Id Modificacion',
            'fecha_fin' => 'Fecha Fin',
            'hora_fin' => 'Hora Fin',
            'transporte_regreso' => 'Transporte Regreso',
            'transporte_ida' => 'Transporte Ida',
            'con_viatico' => 'Con Viatico',
            'dias_sin_pernoctar' => 'Dias Sin Pernoctar',
            'dias_con_pernoctar' => 'Dias Con Pernoctar',
            'estado' => 'Estado',
            'fk_id_cometido' => 'Fk Id Cometido',
        ];
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
}
