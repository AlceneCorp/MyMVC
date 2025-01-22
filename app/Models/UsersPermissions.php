<?php

namespace App\Models;

class UsersPermissions
{
    //Variables Membres
    private $ID;
    private $USERS_ID;
    private $PERMISSIONS_ID;


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

    public function getUSERS_ID()
    {
        return $this->USERS_ID;
    }

    public function setUSERS_ID($USERS_ID)
    {
        $this->USERS_ID = $USERS_ID;
    }

    public function getPERMISSIONS_ID()
    {
        return $this->PERMISSIONS_ID;
    }

    public function setPERMISSIONS_ID($PERMISSIONS_ID)
    {
        $this->PERMISSIONS_ID = $PERMISSIONS_ID;
    }

}
