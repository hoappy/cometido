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
class Destinos extends \yii\db\ActiveRecord
{
    public $fk_id_cometido;
    public $fk_id_destino;
    public $fk_id_sector;
    public $nombre_sector;
    public $fk_id_ciudad;
    public $nombre_ciudad;
    public $fk_id_provincia;
    public $nombre_provincia;
    public $fk_id_region;
    public $nombre_region;
    public $numero_region;

    public function rules()
    {
        return [
            [['fk_id_cometido', 'fk_id_sector', 'fk_id_ciudad', 'fk_id_provincia', 'fk_id_region'], 'required'],
            [['fk_id_cometido', 'fk_id_sector', 'fk_id_ciudad', 'fk_id_provincia', 'fk_id_region'], 'integer'],
            [['fk_id_cometido'], 'exist', 'skipOnError' => true, 'targetClass' => Cometido::className(), 'targetAttribute' => ['fk_id_cometido' => 'id_cometido']],
            [['fk_id_sector'], 'exist', 'skipOnError' => true, 'targetClass' => Sector::className(), 'targetAttribute' => ['fk_id_sector' => 'id_sector']],
            [['fk_id_ciudad'], 'exist', 'skipOnError' => true, 'targetClass' => Ciudad::className(), 'targetAttribute' => ['fk_id_ciudad' => 'id_ciudad']],
            [['fk_id_provincia'], 'exist', 'skipOnError' => true, 'targetClass' => Provincia::className(), 'targetAttribute' => ['fk_id_provincia' => 'id_provincia']],
            [['fk_id_region'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['fk_id_region' => 'id_region']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id_destino' => 'Id Destino',
            'fk_id_cometido' => 'Cometido seleccione cometido',
            'fk_id_sector' => 'Seleccione Sector',
            'fk_id_ciudad' => 'Seleccione Ciudad',
            'fk_id_provincia' => 'Seleccione Provincia',
            'fk_id_region' => 'Seleccione Region',

            'nombre_sector' => 'Sector',
            'nombre_ciudad' => 'Ciudad',
            'nombre_provincia' => 'Provincia',
            'nombre_region' => 'Region',
            'numero_region' => 'Region',
        ];
    }
}
