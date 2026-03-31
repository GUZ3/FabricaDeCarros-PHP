<?php

class Carro
{
    private $modelo;
    private $cor;

    public function __construct($modelo, $cor)
    {
        $this->modelo = $modelo;
        $this->cor = $cor;
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
