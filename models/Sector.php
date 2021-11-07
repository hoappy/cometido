<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sector".
 *
 * @property int $id_sector
 * @property string $nombre_sector
 * @property int $fk_id_ciudad
 *
 * @property Destino[] $destinos
 * @property Ciudad $fkIdCiudad
 */
class Sector extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sector';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_sector', 'fk_id_ciudad'], 'required'],
            [['fk_id_ciudad'], 'integer'],
            [['nombre_sector'], 'string', 'max' => 50],
            [['fk_id_ciudad'], 'exist', 'skipOnError' => true, 'targetClass' => Ciudad::className(), 'targetAttribute' => ['fk_id_ciudad' => 'id_ciudad']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sector' => 'Id Sector',
            'nombre_sector' => 'Nombre Sector',
            'fk_id_ciudad' => 'Ciudad',
        ];
    }

    /**
     * Gets query for [[Destinos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDestinos()
    {
        return $this->hasMany(Destino::className(), ['fk_id_sector' => 'id_sector']);
    }

    /**
     * Gets query for [[FkIdCiudad]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkIdCiudad()
    {
        return $this->hasOne(Ciudad::className(), ['id_ciudad' => 'fk_id_ciudad']);
    }
}
