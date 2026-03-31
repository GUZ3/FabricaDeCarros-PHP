<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque de Carros</title>
    <link rel="stylesheet" href="./public/style.css">
</head>

<body>
    <div class="container">
        <h1>Fábrica de Carros</h1>

        <nav class="menu">
            <a href="index.php">Home</a>
            <a href="index.php?acao=fabricar">Fabricar</a>
            <a href="index.php?acao=vender">Vender</a>
            <a href="index.php?acao=listar">Listar</a>
        </nav>

        <div class="card">
            <h2>Estoque de carros</h2>

            <?php if (empty($carros)): ?>
                <p class="mensagem-vazia">Nenhum carro foi fabricado ainda.</p>
            <?php else: ?>
                <ul class="lista-carros">
                    <?php foreach ($carros as $carro): ?>
                        <li>
                            <strong>Modelo:</strong> <?php echo htmlspecialchars($carro->getModelo()); ?>
                            <span class="separador">|</span>
                            <strong>Cor:</strong> <?php echo htmlspecialchars($carro->getCor()); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>
