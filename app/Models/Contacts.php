<?php

namespace App\Models;

class Contacts
{
    //Variables Membres
    private $ID;
    private $NAME;
    private $EMAIL;
    private $MESSAGE;
    private $CREATED_AT;


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

    public function getNAME()
    {
        return $this->NAME;
    }

    public function setNAME($NAME)
    {
        $this->NAME = $NAME;
    }

    public function getEMAIL()
    {
        return $this->EMAIL;
    }

    public function setEMAIL($EMAIL)
    {
        $this->EMAIL = $EMAIL;
    }

    public function getMESSAGE()
    {
        return $this->MESSAGE;
    }

    public function setMESSAGE($MESSAGE)
    {
        $this->MESSAGE = $MESSAGE;
    }

    public function getCREATED_AT()
    {
        return $this->CREATED_AT;
    }

    public function setCREATED_AT($CREATED_AT)
    {
        $this->CREATED_AT = $CREATED_AT;
    }

}
