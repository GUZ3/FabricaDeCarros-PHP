<?php

class Fabrica
{
    public function fabricar($modelo, $cor)
    {
        $carro = new Carro($modelo, $cor);
        $_SESSION['estoque'][] = $carro;
    }

    public function vender()
    {
        if (!empty($_SESSION['estoque'])) {
            array_shift($_SESSION['estoque']);
            return true;
        }
        return false;
    }

    public function listar()
    {
        return $_SESSION['estoque'] ?? [];
    }
}
