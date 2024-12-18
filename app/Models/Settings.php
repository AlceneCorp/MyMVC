<?php

namespace App\Models;

class Settings
{
    private $ID;
    private $NAME;
    private $VALUE;
    private $DESCRIPTION;
    private $TYPE;
    private $AUTOLOAD;
    private $SETTINGS_CATEGORIES_ID;
    private $CREATED_AT;
    private $UPDATED_AT;


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

    public function getNAME()
    {
        return $this->NAME;
    }

    public function setNAME($NAME)
    {
        $this->NAME = $NAME;
    }

    public function getVALUE()
    {
        return $this->VALUE;
    }

    public function setVALUE($VALUE)
    {
        $this->VALUE = $VALUE;
    }

    public function getDESCRIPTION()
    {
        return $this->DESCRIPTION;
    }

    public function setDESCRIPTION($DESCRIPTION)
    {
        $this->DESCRIPTION = $DESCRIPTION;
    }

    public function getTYPE()
    {
        return $this->TYPE;
    }

    public function setTYPE($TYPE)
    {
        $this->TYPE = $TYPE;
    }

    public function getAUTOLOAD()
    {
        return $this->AUTOLOAD;
    }

    public function setAUTOLOAD($AUTOLOAD)
    {
        $this->AUTOLOAD = $AUTOLOAD;
    }

    public function getSETTINGS_CATEGORIES_ID()
    {
        return $this->SETTINGS_CATEGORIES_ID;
    }

    public function setSETTINGS_CATEGORIES_ID($SETTINGS_CATEGORIES_ID)
    {
        $this->SETTINGS_CATEGORIES_ID = $SETTINGS_CATEGORIES_ID;
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

}
