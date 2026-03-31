<?php

class FabricaController
{
    private $fabrica;

    public function __construct()
    {
        $this->fabrica = new Fabrica();
    }

    public function fabricar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $modelo = trim($_POST['modelo']);
            $cor = trim($_POST['cor']);

            if ($modelo !== '' && $cor !== '') {
                $this->fabrica->fabricar($modelo, $cor);
                $_SESSION['mensagem'] = "Carro <strong>{$modelo}</strong> ({$cor}) fabricado com sucesso!";
                $_SESSION['mensagem_tipo'] = 'sucesso';
            } else {
                $_SESSION['mensagem'] = "Preencha todos os campos antes de fabricar.";
                $_SESSION['mensagem_tipo'] = 'erro';
            }
        }

        include __DIR__ . '/../views/fabricar.php';
    }

    public function vender()
    {
        $vendido = $this->fabrica->vender();

        if ($vendido) {
            $_SESSION['mensagem'] = "Carro vendido com sucesso!";
            $_SESSION['mensagem_tipo'] = 'sucesso';
        } else {
            $_SESSION['mensagem'] = "Nenhum carro em estoque para vender.";
            $_SESSION['mensagem_tipo'] = 'erro';
        }

        include __DIR__ . '/../views/vender.php';
    }

    public function listar()
    {
        $carros = $this->fabrica->listar();
        include __DIR__ . '/../views/listar.php';
    }
}
