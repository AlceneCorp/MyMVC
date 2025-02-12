<?php

namespace App\Modules\Questorium\Models;

class Questions
{
    //Variables Membres
    private $ID;
    private $CATEGORIES_ID;
    private $TEXT;
    private $ANSWERS_CONDITION_ID;
    private $ANSWERS_CONDITION_VALUES;


    //Constructeur
    public function __construct(array $param_Data)
    {
        $this->hydrate($param_Data);
    }

    //Methode d'hydratation pour remplir les objets php
    public function hydrate(array $param_Data)
    {
        foreach ($param_Data as $key => $value) 
        {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) 
            {
                $this->$method($value);
            }
        }
    }

    //Accesseurs

    public function getID()
    {
        return $this->ID;
    }

    public function setID($ID)
    {
        $this->ID = $ID;
    }

    public function getCATEGORIES_ID()
    {
        return $this->CATEGORIES_ID;
    }

    public function setCATEGORIES_ID($CATEGORIES_ID)
    {
        $this->CATEGORIES_ID = $CATEGORIES_ID;
    }

    public function getTEXT()
    {
        return $this->TEXT;
    }

    public function setTEXT($TEXT)
    {
        $this->TEXT = $TEXT;
    }

    public function getANSWERS_CONDITION_ID()
    {
        return $this->ANSWERS_CONDITION_ID;
    }

    public function setANSWERS_CONDITION_ID($ANSWERS_CONDITION_ID)
    {
        $this->ANSWERS_CONDITION_ID = $ANSWERS_CONDITION_ID;
    }

    public function getANSWERS_CONDITION_VALUES()
    {
        return $this->ANSWERS_CONDITION_VALUES;
    }

    public function setANSWERS_CONDITION_VALUES($ANSWERS_CONDITION_VALUES)
    {
        $this->ANSWERS_CONDITION_VALUES = $ANSWERS_CONDITION_VALUES;
    }

}
