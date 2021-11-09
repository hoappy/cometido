<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "destino".
 *
 * @property int $id_destino
 * @property int $fk_id_cometido
 * @property int $fk_id_sector
 *
 * @property Cometido $fkIdCometido
 * @property Sector $fkIdSector
 */
class Destino extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'destino';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_id_cometido', 'fk_id_sector'], 'required'],
            [['fk_id_cometido', 'fk_id_sector'], 'integer'],
            [['fk_id_cometido'], 'exist', 'skipOnError' => true, 'targetClass' => Cometido::className(), 'targetAttribute' => ['fk_id_cometido' => 'id_cometido']],
            [['fk_id_sector'], 'exist', 'skipOnError' => true, 'targetClass' => Sector::className(), 'targetAttribute' => ['fk_id_sector' => 'id_sector']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_destino' => 'Id Destino',
            'fk_id_cometido' => 'Cometido seleccione cometido',
            'fk_id_sector' => 'Seleccione Sector',
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

    /**
     * Gets query for [[FkIdSector]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkIdSector()
    {
        return $this->hasOne(Sector::className(), ['id_sector' => 'fk_id_sector']);
    }
}
