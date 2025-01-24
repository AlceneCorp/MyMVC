<?php

namespace App\Modules\Questorium\Models;

class Questions
{
    //Variables Membres
    private $QUESTIONS_ID;
    private $QUESTIONS_CATEGORIES_ID;
    private $QUESTIONS_TEXT;
    private $QUESTIONS_STYLE;
    private $QUESTIONS_ANSWERS_CONDITION_ID;
    private $QUESTIONS_ANSWERS_CONDITION_VALUES;


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

    public function getQUESTIONS_ID()
    {
        return $this->QUESTIONS_ID;
    }

    public function setQUESTIONS_ID($QUESTIONS_ID)
    {
        $this->QUESTIONS_ID = $QUESTIONS_ID;
    }

    public function getQUESTIONS_CATEGORIES_ID()
    {
        return $this->QUESTIONS_CATEGORIES_ID;
    }

    public function setQUESTIONS_CATEGORIES_ID($QUESTIONS_CATEGORIES_ID)
    {
        $this->QUESTIONS_CATEGORIES_ID = $QUESTIONS_CATEGORIES_ID;
    }

    public function getQUESTIONS_TEXT()
    {
        return $this->QUESTIONS_TEXT;
    }

    public function setQUESTIONS_TEXT($QUESTIONS_TEXT)
    {
        $this->QUESTIONS_TEXT = $QUESTIONS_TEXT;
    }

    public function getQUESTIONS_STYLE()
    {
        return $this->QUESTIONS_STYLE;
    }

    public function setQUESTIONS_STYLE($QUESTIONS_STYLE)
    {
        $this->QUESTIONS_STYLE = $QUESTIONS_STYLE;
    }

    public function getQUESTIONS_ANSWERS_CONDITION_ID()
    {
        return $this->QUESTIONS_ANSWERS_CONDITION_ID;
    }

    public function setQUESTIONS_ANSWERS_CONDITION_ID($QUESTIONS_ANSWERS_CONDITION_ID)
    {
        $this->QUESTIONS_ANSWERS_CONDITION_ID = $QUESTIONS_ANSWERS_CONDITION_ID;
    }

    public function getQUESTIONS_ANSWERS_CONDITION_VALUES()
    {
        return $this->QUESTIONS_ANSWERS_CONDITION_VALUES;
    }

    public function setQUESTIONS_ANSWERS_CONDITION_VALUES($QUESTIONS_ANSWERS_CONDITION_VALUES)
    {
        $this->QUESTIONS_ANSWERS_CONDITION_VALUES = $QUESTIONS_ANSWERS_CONDITION_VALUES;
    }

}
