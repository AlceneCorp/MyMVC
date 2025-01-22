<?php

namespace App\Models;

class Permissions
{
    //Variables Membres
    private $ID;
    private $NAME;
    private $FULLNAME;
    private $DESCRIPTION;
    private $ORDERS;


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

    public function getFULLNAME()
    {
        return $this->FULLNAME;
    }

    public function setFULLNAME($FULLNAME)
    {
        $this->FULLNAME = $FULLNAME;
    }

    public function getDESCRIPTION()
    {
        return $this->DESCRIPTION;
    }

    public function setDESCRIPTION($DESCRIPTION)
    {
        $this->DESCRIPTION = $DESCRIPTION;
    }

    public function getORDERS()
    {
        return $this->ORDERS;
    }

    public function setORDERS($ORDERS)
    {
        $this->ORDERS = $ORDERS;
    }

}
