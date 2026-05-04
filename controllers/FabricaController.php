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
        $mensagem = '';
        $mensagem_tipo = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $modelo = trim($_POST['modelo']);
            $cor = trim($_POST['cor']);

            if ($modelo !== '' && $cor !== '') {
                $this->fabrica->fabricar($modelo, $cor);
                $mensagem = "Carro <strong>{$modelo}</strong> ({$cor}) fabricado com sucesso!";
                $mensagem_tipo = 'sucesso';
            } else {
                $mensagem = "Preencha todos os campos antes de fabricar.";
                $mensagem_tipo = 'erro';
            }
        }

        include __DIR__ . '/../views/fabricar.php';
    }

    public function vender()
    {
        $mensagem = '';
        $mensagem_tipo = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['carro'] ?? null;

            $vendido = $this->fabrica->vender($id);

            if ($vendido) {
                $mensagem = "Carro vendido com sucesso!";
                $mensagem_tipo = 'sucesso';
            } else {
                $mensagem = "Selecione um carro válido.";
                $mensagem_tipo = 'erro';
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
