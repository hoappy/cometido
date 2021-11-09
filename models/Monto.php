<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "monto".
 *
 * @property int $id_monto
 * @property int $monto_sin_pernoctar
 * @property int $monto_con_pernoctar
 * @property int $grado
 * @property int $estado
 * @property int $fk_id_item
 *
 * @property ItemPresupuestario $fkIdItem
 */
class Monto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'monto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['monto_sin_pernoctar', 'monto_con_pernoctar', 'grado', 'fk_id_item'], 'required'],
            [['monto_sin_pernoctar', 'monto_con_pernoctar', 'grado', 'estado', 'fk_id_item'], 'integer'],
            [['fk_id_item'], 'exist', 'skipOnError' => true, 'targetClass' => ItemPresupuestario::className(), 'targetAttribute' => ['fk_id_item' => 'id_item']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_monto' => 'Id Monto',
            'monto_sin_pernoctar' => 'Monto Sin Pernoctar',
            'monto_con_pernoctar' => 'Monto Con Pernoctar',
            'grado' => 'Grado',
            'estado' => 'Estado',
            'fk_id_item' => 'Item Presupuestario',
        ];
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
}
