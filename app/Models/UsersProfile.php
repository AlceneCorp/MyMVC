<?php

namespace App\Models;

class UsersProfile
{
    private $ID;
    private $USERS_ID;
    private $FIRST_NAME;
    private $LAST_NAME;
    private $PHONE_NUMBER;
    private $ADDRESS;
    private $BIRTHDAY;
    private $GENDER;
    private $PROFILE_PICTURE;
    private $ABOUT_ME;


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

    public function getUSERS_ID()
    {
        return $this->USERS_ID;
    }

    public function setUSERS_ID($USERS_ID)
    {
        $this->USERS_ID = $USERS_ID;
    }

    public function getFIRST_NAME()
    {
        return $this->FIRST_NAME;
    }

    public function setFIRST_NAME($FIRST_NAME)
    {
        $this->FIRST_NAME = $FIRST_NAME;
    }

    public function getLAST_NAME()
    {
        return $this->LAST_NAME;
    }

    public function setLAST_NAME($LAST_NAME)
    {
        $this->LAST_NAME = $LAST_NAME;
    }

    public function getPHONE_NUMBER()
    {
        return $this->PHONE_NUMBER;
    }

    public function setPHONE_NUMBER($PHONE_NUMBER)
    {
        $this->PHONE_NUMBER = $PHONE_NUMBER;
    }

    public function getADDRESS()
    {
        return $this->ADDRESS;
    }

    public function setADDRESS($ADDRESS)
    {
        $this->ADDRESS = $ADDRESS;
    }

    public function getBIRTHDAY()
    {
        return $this->BIRTHDAY;
    }

    public function setBIRTHDAY($BIRTHDAY)
    {
        $this->BIRTHDAY = $BIRTHDAY;
    }

    public function getGENDER()
    {
        return $this->GENDER;
    }

    public function setGENDER($GENDER)
    {
        $this->GENDER = $GENDER;
    }

    public function getPROFILE_PICTURE()
    {
        return $this->PROFILE_PICTURE;
    }

    public function setPROFILE_PICTURE($PROFILE_PICTURE)
    {
        $this->PROFILE_PICTURE = $PROFILE_PICTURE;
    }

    public function getABOUT_ME()
    {
        return $this->ABOUT_ME;
    }

    public function setABOUT_ME($ABOUT_ME)
    {
        $this->ABOUT_ME = $ABOUT_ME;
    }

}
