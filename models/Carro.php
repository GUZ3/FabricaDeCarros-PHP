<?php

class Carro
{
    private $id;
    private $modelo;
    private $cor;

    public function __construct($modelo, $cor, $id = null)
    {
        $this->id = $id;
        $this->modelo = $modelo;
        $this->cor = $cor;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function getCor()
    {
        return $this->cor;
    }
}
