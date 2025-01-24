<?php

namespace App\Modules\Questorium\Models;

class Answers
{
    //Variables Membres
    private $ANSWERS_ID;
    private $ANSWERS_QUESTIONS_ID;
    private $ANSWERS_TEXT;
    private $ANSWERS_TYPE;
    private $ANSWERS_MIN;
    private $ANSWERS_MAX;
    private $ANSWERS_VALUES;
    private $ANSWERS_QUESTIONS_CONDITION;


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

    public function getANSWERS_ID()
    {
        return $this->ANSWERS_ID;
    }

    public function setANSWERS_ID($ANSWERS_ID)
    {
        $this->ANSWERS_ID = $ANSWERS_ID;
    }

    public function getANSWERS_QUESTIONS_ID()
    {
        return $this->ANSWERS_QUESTIONS_ID;
    }

    public function setANSWERS_QUESTIONS_ID($ANSWERS_QUESTIONS_ID)
    {
        $this->ANSWERS_QUESTIONS_ID = $ANSWERS_QUESTIONS_ID;
    }

    public function getANSWERS_TEXT()
    {
        return $this->ANSWERS_TEXT;
    }

    public function setANSWERS_TEXT($ANSWERS_TEXT)
    {
        $this->ANSWERS_TEXT = $ANSWERS_TEXT;
    }

    public function getANSWERS_TYPE()
    {
        return $this->ANSWERS_TYPE;
    }

    public function setANSWERS_TYPE($ANSWERS_TYPE)
    {
        $this->ANSWERS_TYPE = $ANSWERS_TYPE;
    }

    public function getANSWERS_MIN()
    {
        return $this->ANSWERS_MIN;
    }

    public function setANSWERS_MIN($ANSWERS_MIN)
    {
        $this->ANSWERS_MIN = $ANSWERS_MIN;
    }

    public function getANSWERS_MAX()
    {
        return $this->ANSWERS_MAX;
    }

    public function setANSWERS_MAX($ANSWERS_MAX)
    {
        $this->ANSWERS_MAX = $ANSWERS_MAX;
    }

    public function getANSWERS_VALUES()
    {
        return $this->ANSWERS_VALUES;
    }

    public function setANSWERS_VALUES($ANSWERS_VALUES)
    {
        $this->ANSWERS_VALUES = $ANSWERS_VALUES;
    }

    public function getANSWERS_QUESTIONS_CONDITION()
    {
        return $this->ANSWERS_QUESTIONS_CONDITION;
    }

    public function setANSWERS_QUESTIONS_CONDITION($ANSWERS_QUESTIONS_CONDITION)
    {
        $this->ANSWERS_QUESTIONS_CONDITION = $ANSWERS_QUESTIONS_CONDITION;
    }

}
