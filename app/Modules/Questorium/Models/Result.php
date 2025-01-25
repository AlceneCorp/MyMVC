<?php

namespace App\Modules\Questorium\Models;

class Result
{
    //Variables Membres
    private $ID;
    private $ACCOUNTS_ID;
    private $QUIZ_ID;
    private $CATEGORIES_ID;
    private $QUESTIONS_ID;
    private $ANSWERS_ID;
    private $SUBANSWERS_ID;
    private $VALUES;
    private $TIMESTAMP;


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

    public function getACCOUNTS_ID()
    {
        return $this->ACCOUNTS_ID;
    }

    public function setACCOUNTS_ID($ACCOUNTS_ID)
    {
        $this->ACCOUNTS_ID = $ACCOUNTS_ID;
    }

    public function getQUIZ_ID()
    {
        return $this->QUIZ_ID;
    }

    public function setQUIZ_ID($QUIZ_ID)
    {
        $this->QUIZ_ID = $QUIZ_ID;
    }

    public function getCATEGORIES_ID()
    {
        return $this->CATEGORIES_ID;
    }

    public function setCATEGORIES_ID($CATEGORIES_ID)
    {
        $this->CATEGORIES_ID = $CATEGORIES_ID;
    }

    public function getQUESTIONS_ID()
    {
        return $this->QUESTIONS_ID;
    }

    public function setQUESTIONS_ID($QUESTIONS_ID)
    {
        $this->QUESTIONS_ID = $QUESTIONS_ID;
    }

    public function getANSWERS_ID()
    {
        return $this->ANSWERS_ID;
    }

    public function setANSWERS_ID($ANSWERS_ID)
    {
        $this->ANSWERS_ID = $ANSWERS_ID;
    }

    public function getSUBANSWERS_ID()
    {
        return $this->SUBANSWERS_ID;
    }

    public function setSUBANSWERS_ID($SUBANSWERS_ID)
    {
        $this->SUBANSWERS_ID = $SUBANSWERS_ID;
    }

    public function getVALUES()
    {
        return $this->VALUES;
    }

    public function setVALUES($VALUES)
    {
        $this->VALUES = $VALUES;
    }

    public function getTIMESTAMP()
    {
        return $this->TIMESTAMP;
    }

    public function setTIMESTAMP($TIMESTAMP)
    {
        $this->TIMESTAMP = $TIMESTAMP;
    }

}
