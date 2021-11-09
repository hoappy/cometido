<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item_presupuestario".
 *
 * @property int $id_item
 * @property string $nombre_item
 * @property int $porcentaje
 * @property int $estado
 * @property string $descripcion
 *
 * @property Cometido[] $cometidos
 * @property Monto[] $montos
 */
class ItemPresupuestario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item_presupuestario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_item', 'porcentaje', 'descripcion'], 'required'],
            [['porcentaje', 'estado'], 'integer'],
            [['nombre_item'], 'string', 'max' => 50],
            [['descripcion'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_item' => 'Nombre Item Presupuestario',
            'nombre_item' => 'Nombre Item',
            'porcentaje' => 'Porcentaje',
            'estado' => 'Estado',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[Cometidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCometidos()
    {
        return $this->hasMany(Cometido::className(), ['fk_id_item' => 'id_item']);
    }

    /**
     * Gets query for [[Montos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMontos()
    {
        return $this->hasMany(Monto::className(), ['fk_id_item' => 'id_item']);
    }
}
