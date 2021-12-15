<?php

namespace app\models;

use Yii;

class FormFechaIDCometido extends \yii\db\ActiveRecord
{
    public $inicio;
    public $fin;
    public $id;
    public $estado;
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
            [['inicio', 'fin', 'id', 'estado'], 'required'],
            [['inicio', 'fin'], 'date', 'format' => 'dd-MM-yyyy'],
            [['inicio', 'fin'], 'rango'],
            [['estado'], 'integer'],
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

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'inicio' => 'Fecha Desde',
            'fin' => 'Fecha Hasta',
            'id' => 'Seleccione un Parametro',
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

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
