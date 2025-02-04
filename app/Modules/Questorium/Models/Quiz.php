<?php

namespace App\Modules\Questorium\Models;

class Quiz
{
    //Variables Membres
    private $ID;
    private $TEXT;
    private $START;
    private $END;
    private $DESC;
    private $LOGO;
    private $SLUG;


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

    public function getTEXT()
    {
        return $this->TEXT;
    }

    public function setTEXT($TEXT)
    {
        $this->TEXT = $TEXT;
    }

    public function getSTART()
    {
        return $this->START;
    }

    public function setSTART($START)
    {
        $this->START = $START;
    }

    public function getEND()
    {
        return $this->END;
    }

    public function setEND($END)
    {
        $this->END = $END;
    }

    public function getDESC()
    {
        return $this->DESC;
    }

    public function setDESC($DESC)
    {
        $this->DESC = $DESC;
    }

    public function getLOGO()
    {
        return $this->LOGO;
    }

    public function setLOGO($LOGO)
    {
        $this->LOGO = $LOGO;
    }

    public function getSLUG()
    {
        return $this->SLUG;
    }

    public function setSLUG($SLUG)
    {
        $this->SLUG = $SLUG;
    }

}
