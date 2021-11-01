<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property int $id_region
 * @property string $nombre_region
 * @property int $numero_region
 *
 * @property Provincia[] $provincias
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_region', 'numero_region'], 'required'],
            [['numero_region'], 'integer'],
            [['nombre_region'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_region' => 'Id Region',
            'nombre_region' => 'Nombre Region',
            'numero_region' => 'Numero Region',
        ];
    }

    /**
     * Gets query for [[Provincias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProvincias()
    {
        return $this->hasMany(Provincia::className(), ['fk_id_region' => 'id_region']);
    }
}
