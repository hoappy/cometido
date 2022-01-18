<?php

namespace app\models;

use Yii;

class FormFechaSector extends \yii\db\ActiveRecord
{
    public $inicio;
    public $fin;
    public $fk_id_region;
    public $fk_id_provincia;
    public $fk_id_ciudad;
    public $id;
    /**
     * {@inheritdoc}
     */
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
            [['fk_id_region', 'fk_id_provincia', 'fk_id_ciudad', 'inicio', 'fin'], 'required'],
            [['inicio', 'fin'], 'date', 'format' => 'dd-MM-yyyy'],
            [['inicio', 'fin'], 'rango'],
            ['fin', 'compare', 'compareAttribute' => 'inicio', 'operator' => '>'],
        ];
    }

    public function rango($attribute)
    {
        $date1 = $this->inicio;
        $date2 = $this->fin;
        $years = $date1->diff($date2)->format('%y');

        if ($years != 0) {
            $this->addError($attribute, "Seleccione un rango inferior a 12 meses");
        }
    }


    /*
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'inicio' => 'Fecha Desde',
            'fin' => 'Fecha Hasta',
            'fk_id_ciudad' => 'Selecione una Ciudad',
            'fk_id_region' => 'Selecciona una Region',
            'fk_id_provincia' => 'Selecciona una Provincia',
        ];
    }

    /**
     * Get the value of inicio
     */
    public function getInicio()
    {
        return $this->inicio;
    }

    /**
     * Set the value of inicio
     *
     * @return  self
     */
    public function setInicio($inicio)
    {
        $this->inicio = $inicio;

        return $this;
    }

    /**
     * Get the value of fin
     */
    public function getFin()
    {
        return $this->fin;
    }

    /**
     * Set the value of fin
     *
     * @return  self
     */
    public function setFin($fin)
    {
        $this->fin = $fin;

        return $this;
    }
}
