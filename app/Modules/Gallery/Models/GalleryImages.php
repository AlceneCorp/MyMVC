<?php

namespace App\Modules\Gallery\Models;

class GalleryImages
{
    //Variables Membres
    private $ID;
    private $GALLERY_CATEGORY_ID;
    private $TITLE;
    private $DESCRIPTION;
    private $FILE_PATH;
    private $SLUG;
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

    public function getGALLERY_CATEGORY_ID()
    {
        return $this->GALLERY_CATEGORY_ID;
    }

    public function setGALLERY_CATEGORY_ID($GALLERY_CATEGORY_ID)
    {
        $this->GALLERY_CATEGORY_ID = $GALLERY_CATEGORY_ID;
    }

    public function getTITLE()
    {
        return $this->TITLE;
    }

    public function setTITLE($TITLE)
    {
        $this->TITLE = $TITLE;
    }

    public function getDESCRIPTION()
    {
        return $this->DESCRIPTION;
    }

    public function setDESCRIPTION($DESCRIPTION)
    {
        $this->DESCRIPTION = $DESCRIPTION;
    }

    public function getFILE_PATH()
    {
        return $this->FILE_PATH;
    }

    public function setFILE_PATH($FILE_PATH)
    {
        $this->FILE_PATH = $FILE_PATH;
    }

    public function getSLUG()
    {
        return $this->SLUG;
    }

    public function setSLUG($SLUG)
    {
        $this->SLUG = $SLUG;
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
