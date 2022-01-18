<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ciudad".
 *
 * @property int $id_ciudad
 * @property string $nombre_ciudad
 * @property int $estado
 * @property int $fk_id_provincia
 *
 * @property Provincia $fkIdProvincia
 * @property Sector[] $sectors
 */
class Ciudad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $fk_id_region;

    public static function tableName()
    {
        return 'ciudad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_id_region' , 'nombre_ciudad', 'fk_id_provincia'], 'required'],
            [['estado', 'fk_id_provincia'], 'integer'],
            [['nombre_ciudad'], 'string', 'max' => 50],
            [['fk_id_provincia'], 'exist', 'skipOnError' => true, 'targetClass' => Provincia::className(), 'targetAttribute' => ['fk_id_provincia' => 'id_provincia']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ciudad' => 'Id Ciudad',
            'nombre_ciudad' => 'Nombre Ciudad',
            'estado' => 'Estado',
            'fk_id_provincia' => 'Seleccione una Provincia',
            'fk_id_region' => 'Seleccione una Region',
        ];
    }

    /**
     * Gets query for [[FkIdProvincia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkIdProvincia()
    {
        return $this->hasOne(Provincia::className(), ['id_provincia' => 'fk_id_provincia']);
    }

    /**
     * Gets query for [[Sectors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSectors()
    {
        return $this->hasMany(Sector::className(), ['fk_id_ciudad' => 'id_ciudad']);
    }
}
