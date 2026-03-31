<?php

require_once 'models/Carro.php';
require_once 'models/Fabrica.php';
require_once 'controllers/FabricaController.php';

session_start();

$controller = new FabricaController();

$acao = $_GET['acao'] ?? 'home';

switch ($acao) {
    case 'fabricar':
        $controller->fabricar();
        break;

    case 'vender':
        $controller->vender();
        break;

    case 'listar':
        $controller->listar();
        break;

    default:
        include 'views/home.php';
        break;
}
