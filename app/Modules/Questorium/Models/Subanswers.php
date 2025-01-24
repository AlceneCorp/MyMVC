<?php

namespace App\Modules\Questorium\Models;

class Subanswers
{
    //Variables Membres
    private $SUBANSWERS_ID;
    private $SUBANSWERS_ANSWERS_ID;
    private $SUBANSWERS_TEXT;
    private $SUBANSWERS_VALUES;


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

    public function getSUBANSWERS_ID()
    {
        return $this->SUBANSWERS_ID;
    }

    public function setSUBANSWERS_ID($SUBANSWERS_ID)
    {
        $this->SUBANSWERS_ID = $SUBANSWERS_ID;
    }

    public function getSUBANSWERS_ANSWERS_ID()
    {
        return $this->SUBANSWERS_ANSWERS_ID;
    }

    public function setSUBANSWERS_ANSWERS_ID($SUBANSWERS_ANSWERS_ID)
    {
        $this->SUBANSWERS_ANSWERS_ID = $SUBANSWERS_ANSWERS_ID;
    }

    public function getSUBANSWERS_TEXT()
    {
        return $this->SUBANSWERS_TEXT;
    }

    public function setSUBANSWERS_TEXT($SUBANSWERS_TEXT)
    {
        $this->SUBANSWERS_TEXT = $SUBANSWERS_TEXT;
    }

    public function getSUBANSWERS_VALUES()
    {
        return $this->SUBANSWERS_VALUES;
    }

    public function setSUBANSWERS_VALUES($SUBANSWERS_VALUES)
    {
        $this->SUBANSWERS_VALUES = $SUBANSWERS_VALUES;
    }

}
