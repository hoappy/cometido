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
    public $id_cometido;
    public $id_destino;
    public $id_sector;
    public $nombre_sector;
    public $id_ciudad;
    public $nombre_ciudad;
    public $id_provincia;
    public $nombre_provincia;
    public $id_region;
    public $nombre_region;
    public $numero_region;

    public static function getDestinos($id)
    {
        $query = (new \yii\db\Query())
            -> select('*')
            ->from('departamento'); //iba hacer join pero quedara pendiente por ahora
            
        return $query;
    }
}
