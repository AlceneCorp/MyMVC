<?php

namespace App\Models;

class Users
{
    //Variables Membres
    private $ID;
    private $USERNAME;
    private $EMAIL;
    private $PASSWORD;
    private $STATUS;
    private $CREATED_AT;
    private $UPDATED_AT;
    private $LAST_LOGIN;
    private $EMAIL_VERIFIED;
    private $TWO_FACTOR_ENABLED;
    private $API_TOKEN;
    private $DELETED_AT;


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

    public function getUSERNAME()
    {
        return $this->USERNAME;
    }

    public function setUSERNAME($USERNAME)
    {
        $this->USERNAME = $USERNAME;
    }

    public function getEMAIL()
    {
        return $this->EMAIL;
    }

    public function setEMAIL($EMAIL)
    {
        $this->EMAIL = $EMAIL;
    }

    public function getPASSWORD()
    {
        return $this->PASSWORD;
    }

    public function setPASSWORD($PASSWORD)
    {
        $this->PASSWORD = $PASSWORD;
    }

    public function getSTATUS()
    {
        return $this->STATUS;
    }

    public function setSTATUS($STATUS)
    {
        $this->STATUS = $STATUS;
    }

    public function getCREATED_AT()
    {
        return $this->CREATED_AT;
    }

    public function setCREATED_AT($CREATED_AT)
    {
        $this->CREATED_AT = $CREATED_AT;
    }

    public function getUPDATED_AT()
    {
        return $this->UPDATED_AT;
    }

    public function setUPDATED_AT($UPDATED_AT)
    {
        $this->UPDATED_AT = $UPDATED_AT;
    }

    public function getLAST_LOGIN()
    {
        return $this->LAST_LOGIN;
    }

    public function setLAST_LOGIN($LAST_LOGIN)
    {
        $this->LAST_LOGIN = $LAST_LOGIN;
    }

    public function getEMAIL_VERIFIED()
    {
        return $this->EMAIL_VERIFIED;
    }

    public function setEMAIL_VERIFIED($EMAIL_VERIFIED)
    {
        $this->EMAIL_VERIFIED = $EMAIL_VERIFIED;
    }

    public function getTWO_FACTOR_ENABLED()
    {
        return $this->TWO_FACTOR_ENABLED;
    }

    public function setTWO_FACTOR_ENABLED($TWO_FACTOR_ENABLED)
    {
        $this->TWO_FACTOR_ENABLED = $TWO_FACTOR_ENABLED;
    }

    public function getAPI_TOKEN()
    {
        return $this->API_TOKEN;
    }

    public function setAPI_TOKEN($API_TOKEN)
    {
        $this->API_TOKEN = $API_TOKEN;
    }

    public function getDELETED_AT()
    {
        return $this->DELETED_AT;
    }

    public function setDELETED_AT($DELETED_AT)
    {
        $this->DELETED_AT = $DELETED_AT;
    }

}
