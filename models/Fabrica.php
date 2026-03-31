<?php

class Fabrica
{
    public function fabricar($modelo, $cor)
    {
        $carro = new Carro($modelo, $cor);
        $_SESSION['estoque'][] = $carro;
    }

    public function vender($index)
    {
        if (isset($_SESSION['estoque'][$index])) {
            unset($_SESSION['estoque'][$index]);
            $_SESSION['estoque'] = array_values($_SESSION['estoque']); // reindexa
            return true;
        }
    return false;
    }

    public function listar()
    {
        return $_SESSION['estoque'] ?? [];
    }
}
