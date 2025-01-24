<?php

namespace App\Modules\Questorium\Models;

class Result
{
    //Variables Membres
    private $RESULT_ID;
    private $RESULT_ACCOUNTS_ID;
    private $RESULT_QUIZ_ID;
    private $RESULT_CATEGORIES_ID;
    private $RESULT_QUESTIONS_ID;
    private $RESULT_ANSWERS_ID;
    private $RESULT_SUBANSWERS_ID;
    private $RESULT_VALUES;
    private $RESULT_TIMESTAMP;


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

    public function getRESULT_ID()
    {
        return $this->RESULT_ID;
    }

    public function setRESULT_ID($RESULT_ID)
    {
        $this->RESULT_ID = $RESULT_ID;
    }

    public function getRESULT_ACCOUNTS_ID()
    {
        return $this->RESULT_ACCOUNTS_ID;
    }

    public function setRESULT_ACCOUNTS_ID($RESULT_ACCOUNTS_ID)
    {
        $this->RESULT_ACCOUNTS_ID = $RESULT_ACCOUNTS_ID;
    }

    public function getRESULT_QUIZ_ID()
    {
        return $this->RESULT_QUIZ_ID;
    }

    public function setRESULT_QUIZ_ID($RESULT_QUIZ_ID)
    {
        $this->RESULT_QUIZ_ID = $RESULT_QUIZ_ID;
    }

    public function getRESULT_CATEGORIES_ID()
    {
        return $this->RESULT_CATEGORIES_ID;
    }

    public function setRESULT_CATEGORIES_ID($RESULT_CATEGORIES_ID)
    {
        $this->RESULT_CATEGORIES_ID = $RESULT_CATEGORIES_ID;
    }

    public function getRESULT_QUESTIONS_ID()
    {
        return $this->RESULT_QUESTIONS_ID;
    }

    public function setRESULT_QUESTIONS_ID($RESULT_QUESTIONS_ID)
    {
        $this->RESULT_QUESTIONS_ID = $RESULT_QUESTIONS_ID;
    }

    public function getRESULT_ANSWERS_ID()
    {
        return $this->RESULT_ANSWERS_ID;
    }

    public function setRESULT_ANSWERS_ID($RESULT_ANSWERS_ID)
    {
        $this->RESULT_ANSWERS_ID = $RESULT_ANSWERS_ID;
    }

    public function getRESULT_SUBANSWERS_ID()
    {
        return $this->RESULT_SUBANSWERS_ID;
    }

    public function setRESULT_SUBANSWERS_ID($RESULT_SUBANSWERS_ID)
    {
        $this->RESULT_SUBANSWERS_ID = $RESULT_SUBANSWERS_ID;
    }

    public function getRESULT_VALUES()
    {
        return $this->RESULT_VALUES;
    }

    public function setRESULT_VALUES($RESULT_VALUES)
    {
        $this->RESULT_VALUES = $RESULT_VALUES;
    }

    public function getRESULT_TIMESTAMP()
    {
        return $this->RESULT_TIMESTAMP;
    }

    public function setRESULT_TIMESTAMP($RESULT_TIMESTAMP)
    {
        $this->RESULT_TIMESTAMP = $RESULT_TIMESTAMP;
    }

}
