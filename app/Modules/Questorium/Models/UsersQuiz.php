<?php

namespace App\Modules\Questorium\Models;

class UsersQuiz
{
    //Variables Membres
    private $ID;
    private $USERS_ID;
    private $QUIZ_ID;
    private $QUIZ_VALIDATE;


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

    public function getQUIZ_ID()
    {
        return $this->QUIZ_ID;
    }

    public function setQUIZ_ID($QUIZ_ID)
    {
        $this->QUIZ_ID = $QUIZ_ID;
    }

    public function getQUIZ_VALIDATE()
    {
        return $this->QUIZ_VALIDATE;
    }

    public function setQUIZ_VALIDATE($QUIZ_VALIDATE)
    {
        $this->QUIZ_VALIDATE = $QUIZ_VALIDATE;
    }

}
