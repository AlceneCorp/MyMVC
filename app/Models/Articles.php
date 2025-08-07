<?php

namespace App\Models;

class Articles
{
    //Variables Membres
    private $ID;
    private $VISIBLE;
    private $TITLE;
    private $IMG;
    private $USERS_ID;
    private $TEXT;
    private $DESCRIPTION;
    private $DATE;
    private $UPDATED_AT;


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

    public function getVISIBLE()
    {
        return $this->VISIBLE;
    }

    public function setVISIBLE($VISIBLE)
    {
        $this->VISIBLE = $VISIBLE;
    }

    public function getTITLE()
    {
        return $this->TITLE;
    }

    public function setTITLE($TITLE)
    {
        $this->TITLE = $TITLE;
    }

    public function getIMG()
    {
        return $this->IMG;
    }

    public function setIMG($IMG)
    {
        $this->IMG = $IMG;
    }

    public function getUSERS_ID()
    {
        return $this->USERS_ID;
    }

    public function setUSERS_ID($USERS_ID)
    {
        $this->USERS_ID = $USERS_ID;
    }

    public function getTEXT()
    {
        return $this->TEXT;
    }

    public function setTEXT($TEXT)
    {
        $this->TEXT = $TEXT;
    }

    public function getDESCRIPTION()
    {
        return $this->DESCRIPTION;
    }

    public function setDESCRIPTION($DESCRIPTION)
    {
        $this->DESCRIPTION = $DESCRIPTION;
    }

    public function getDATE()
    {
        return $this->DATE;
    }

    public function setDATE($DATE)
    {
        $this->DATE = $DATE;
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
