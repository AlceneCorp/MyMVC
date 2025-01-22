<?php

namespace App\Models;

class Visitor
{
    //Variables Membres
    private $ID;
    private $VISIT_DATE;
    private $PAGE_VISITED;
    private $IP_ADDRESS;


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

    public function getVISIT_DATE()
    {
        return $this->VISIT_DATE;
    }

    public function setVISIT_DATE($VISIT_DATE)
    {
        $this->VISIT_DATE = $VISIT_DATE;
    }

    public function getPAGE_VISITED()
    {
        return $this->PAGE_VISITED;
    }

    public function setPAGE_VISITED($PAGE_VISITED)
    {
        $this->PAGE_VISITED = $PAGE_VISITED;
    }

    public function getIP_ADDRESS()
    {
        return $this->IP_ADDRESS;
    }

    public function setIP_ADDRESS($IP_ADDRESS)
    {
        $this->IP_ADDRESS = $IP_ADDRESS;
    }

}
