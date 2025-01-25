<?php

namespace App\Modules\Questorium\Models;

class Categories
{
    //Variables Membres
    private $ID;
    private $QUIZ_ID;
    private $TEXT;
    private $DESC;
    private $STYLE;
    private $COLOR;


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

    public function getQUIZ_ID()
    {
        return $this->QUIZ_ID;
    }

    public function setQUIZ_ID($QUIZ_ID)
    {
        $this->QUIZ_ID = $QUIZ_ID;
    }

    public function getTEXT()
    {
        return $this->TEXT;
    }

    public function setTEXT($TEXT)
    {
        $this->TEXT = $TEXT;
    }

    public function getDESC()
    {
        return $this->DESC;
    }

    public function setDESC($DESC)
    {
        $this->DESC = $DESC;
    }

    public function getSTYLE()
    {
        return $this->STYLE;
    }

    public function setSTYLE($STYLE)
    {
        $this->STYLE = $STYLE;
    }

    public function getCOLOR()
    {
        return $this->COLOR;
    }

    public function setCOLOR($COLOR)
    {
        $this->COLOR = $COLOR;
    }

}
