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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $index = $_POST['carro'] ?? null;

        $vendido = $this->fabrica->vender($index);

        if ($vendido) {
            $_SESSION['mensagem'] = "Carro vendido com sucesso!";
            $_SESSION['mensagem_tipo'] = 'sucesso';
        } else {
            $_SESSION['mensagem'] = "Selecione um carro válido.";
            $_SESSION['mensagem_tipo'] = 'erro';
        }
    }

    $carros = $this->fabrica->listar();
    include __DIR__ . '/../views/vender.php';
    }   

    public function listar()
    {
        $carros = $this->fabrica->listar();
        include __DIR__ . '/../views/listar.php';
    }
}
