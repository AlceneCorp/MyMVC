<?php

namespace App\Modules\Questorium\Models;

class Quiz
{
    //Variables Membres
    private $QUIZ_ID;
    private $QUIZ_TEXT;
    private $QUIZ_START;
    private $QUIZ_END;
    private $QUIZ_DESC;
    private $QUIZ_LOGO;
    private $QUIZ_STYLE;


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

    public function getQUIZ_ID()
    {
        return $this->QUIZ_ID;
    }

    public function setQUIZ_ID($QUIZ_ID)
    {
        $this->QUIZ_ID = $QUIZ_ID;
    }

    public function getQUIZ_TEXT()
    {
        return $this->QUIZ_TEXT;
    }

    public function setQUIZ_TEXT($QUIZ_TEXT)
    {
        $this->QUIZ_TEXT = $QUIZ_TEXT;
    }

    public function getQUIZ_START()
    {
        return $this->QUIZ_START;
    }

    public function setQUIZ_START($QUIZ_START)
    {
        $this->QUIZ_START = $QUIZ_START;
    }

    public function getQUIZ_END()
    {
        return $this->QUIZ_END;
    }

    public function setQUIZ_END($QUIZ_END)
    {
        $this->QUIZ_END = $QUIZ_END;
    }

    public function getQUIZ_DESC()
    {
        return $this->QUIZ_DESC;
    }

    public function setQUIZ_DESC($QUIZ_DESC)
    {
        $this->QUIZ_DESC = $QUIZ_DESC;
    }

    public function getQUIZ_LOGO()
    {
        return $this->QUIZ_LOGO;
    }

    public function setQUIZ_LOGO($QUIZ_LOGO)
    {
        $this->QUIZ_LOGO = $QUIZ_LOGO;
    }

    public function getQUIZ_STYLE()
    {
        return $this->QUIZ_STYLE;
    }

    public function setQUIZ_STYLE($QUIZ_STYLE)
    {
        $this->QUIZ_STYLE = $QUIZ_STYLE;
    }

}
