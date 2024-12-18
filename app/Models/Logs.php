<?php

namespace App\Models;

class Logs
{
    private $ID;
    private $LEVEL;
    private $CATEGORY;
    private $MESSAGE;
    private $CREATED_AT;
    private $USERS_ID;
    private $IP_ADDRESS;
    private $METHOD;
    private $URI;


    public function __construct(array $param_Data)
    {
        $this->hydrate($param_Data);
    }

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


    public function getID()
    {
        return $this->ID;
    }

    public function setID($ID)
    {
        $this->ID = $ID;
    }

    public function getLEVEL()
    {
        return $this->LEVEL;
    }

    public function setLEVEL($LEVEL)
    {
        $this->LEVEL = $LEVEL;
    }

    public function getCATEGORY()
    {
        return $this->CATEGORY;
    }

    public function setCATEGORY($CATEGORY)
    {
        $this->CATEGORY = $CATEGORY;
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

    public function getUSERS_ID()
    {
        return $this->USERS_ID;
    }

    public function setUSERS_ID($USERS_ID)
    {
        $this->USERS_ID = $USERS_ID;
    }

    public function getIP_ADDRESS()
    {
        return $this->IP_ADDRESS;
    }

    public function setIP_ADDRESS($IP_ADDRESS)
    {
        $this->IP_ADDRESS = $IP_ADDRESS;
    }

    public function getMETHOD()
    {
        return $this->METHOD;
    }

    public function setMETHOD($METHOD)
    {
        $this->METHOD = $METHOD;
    }

    public function getURI()
    {
        return $this->URI;
    }

    public function setURI($URI)
    {
        $this->URI = $URI;
    }

}
