<?php

namespace App\Modules\Questorium\Models;

class Answers
{
    //Variables Membres
    private $ID;
    private $QUESTIONS_ID;
    private $TEXT;
    private $TYPE;
    private $MIN;
    private $MAX;
    private $VALUES;
    private $QUESTIONS_CONDITION;


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

    public function getQUESTIONS_ID()
    {
        return $this->QUESTIONS_ID;
    }

    public function setQUESTIONS_ID($QUESTIONS_ID)
    {
        $this->QUESTIONS_ID = $QUESTIONS_ID;
    }

    public function getTEXT()
    {
        return $this->TEXT;
    }

    public function setTEXT($TEXT)
    {
        $this->TEXT = $TEXT;
    }

    public function getTYPE()
    {
        return $this->TYPE;
    }

    public function setTYPE($TYPE)
    {
        $this->TYPE = $TYPE;
    }

    public function getMIN()
    {
        return $this->MIN;
    }

    public function setMIN($MIN)
    {
        $this->MIN = $MIN;
    }

    public function getMAX()
    {
        return $this->MAX;
    }

    public function setMAX($MAX)
    {
        $this->MAX = $MAX;
    }

    public function getVALUES()
    {
        return $this->VALUES;
    }

    public function setVALUES($VALUES)
    {
        $this->VALUES = $VALUES;
    }

    public function getQUESTIONS_CONDITION()
    {
        return $this->QUESTIONS_CONDITION;
    }

    public function setQUESTIONS_CONDITION($QUESTIONS_CONDITION)
    {
        $this->QUESTIONS_CONDITION = $QUESTIONS_CONDITION;
    }

}
