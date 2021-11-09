<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "provincia".
 *
 * @property int $id_provincia
 * @property string $nombre_provincia
 * @property int $estado
 * @property int $fk_id_region
 *
 * @property Ciudad[] $ciudads
 * @property Region $fkIdRegion
 */
class Provincia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'provincia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_provincia', 'fk_id_region'], 'required'],
            [['estado', 'fk_id_region'], 'integer'],
            [['nombre_provincia'], 'string', 'max' => 50],
            [['fk_id_region'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['fk_id_region' => 'id_region']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_provincia' => 'Id Provincia',
            'nombre_provincia' => 'Nombre Provincia',
            'estado' => 'Estado',
            'fk_id_region' => 'Region',
        ];
    }

    /**
     * Gets query for [[Ciudads]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCiudads()
    {
        return $this->hasMany(Ciudad::className(), ['fk_id_provincia' => 'id_provincia']);
    }

    /**
     * Gets query for [[FkIdRegion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkIdRegion()
    {
        return $this->hasOne(Region::className(), ['id_region' => 'fk_id_region']);
    }
}
