<?php

namespace App\Models;

class Menu
{
    private $ID;
    private $TITLE;
    private $SLUG;
    private $IS_DROPDOWN;
    private $PARENT_ID;
    private $URL;
    private $ORDER;
    private $IS_ACTIVE;
    private $PERMISSIONS_ID;
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

    public function getTITLE()
    {
        return $this->TITLE;
    }

    public function setTITLE($TITLE)
    {
        $this->TITLE = $TITLE;
    }

    public function getSLUG()
    {
        return $this->SLUG;
    }

    public function setSLUG($SLUG)
    {
        $this->SLUG = $SLUG;
    }

    public function getIS_DROPDOWN()
    {
        return $this->IS_DROPDOWN;
    }

    public function setIS_DROPDOWN($IS_DROPDOWN)
    {
        $this->IS_DROPDOWN = $IS_DROPDOWN;
    }

    public function getPARENT_ID()
    {
        return $this->PARENT_ID;
    }

    public function setPARENT_ID($PARENT_ID)
    {
        $this->PARENT_ID = $PARENT_ID;
    }

    public function getURL()
    {
        return $this->URL;
    }

    public function setURL($URL)
    {
        $this->URL = $URL;
    }

    public function getORDER()
    {
        return $this->ORDER;
    }

    public function setORDER($ORDER)
    {
        $this->ORDER = $ORDER;
    }

    public function getIS_ACTIVE()
    {
        return $this->IS_ACTIVE;
    }

    public function setIS_ACTIVE($IS_ACTIVE)
    {
        $this->IS_ACTIVE = $IS_ACTIVE;
    }

    public function getPERMISSIONS_ID()
    {
        return $this->PERMISSIONS_ID;
    }

    public function setPERMISSIONS_ID($PERMISSIONS_ID)
    {
        $this->PERMISSIONS_ID = $PERMISSIONS_ID;
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
