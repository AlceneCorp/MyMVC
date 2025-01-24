<?php

namespace App\Modules\Questorium\Models;

class Categories
{
    //Variables Membres
    private $CATEGORIES_ID;
    private $CATEGORIES_QUIZ_ID;
    private $CATEGORIES_TEXT;
    private $CATEGORIES_DESC;
    private $CATEGORIES_STYLE;
    private $CATEGORIES_COLOR;


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

    public function getCATEGORIES_ID()
    {
        return $this->CATEGORIES_ID;
    }

    public function setCATEGORIES_ID($CATEGORIES_ID)
    {
        $this->CATEGORIES_ID = $CATEGORIES_ID;
    }

    public function getCATEGORIES_QUIZ_ID()
    {
        return $this->CATEGORIES_QUIZ_ID;
    }

    public function setCATEGORIES_QUIZ_ID($CATEGORIES_QUIZ_ID)
    {
        $this->CATEGORIES_QUIZ_ID = $CATEGORIES_QUIZ_ID;
    }

    public function getCATEGORIES_TEXT()
    {
        return $this->CATEGORIES_TEXT;
    }

    public function setCATEGORIES_TEXT($CATEGORIES_TEXT)
    {
        $this->CATEGORIES_TEXT = $CATEGORIES_TEXT;
    }

    public function getCATEGORIES_DESC()
    {
        return $this->CATEGORIES_DESC;
    }

    public function setCATEGORIES_DESC($CATEGORIES_DESC)
    {
        $this->CATEGORIES_DESC = $CATEGORIES_DESC;
    }

    public function getCATEGORIES_STYLE()
    {
        return $this->CATEGORIES_STYLE;
    }

    public function setCATEGORIES_STYLE($CATEGORIES_STYLE)
    {
        $this->CATEGORIES_STYLE = $CATEGORIES_STYLE;
    }

    public function getCATEGORIES_COLOR()
    {
        return $this->CATEGORIES_COLOR;
    }

    public function setCATEGORIES_COLOR($CATEGORIES_COLOR)
    {
        $this->CATEGORIES_COLOR = $CATEGORIES_COLOR;
    }

}
