<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vender Carro</title>
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

        <?php if (!empty($mensagem)): ?>
            <div class="mensagem <?php echo htmlspecialchars($mensagem_tipo); ?>">
                <?php echo $mensagem; ?>
            </div>
        <?php endif; ?>

    <div class="card">
    <h2>Vender carro</h2>

    <?php if (!empty($carros)): ?>
        <form method="POST">
            <label for="carro">Selecione o carro:</label>

            <select name="carro" required>
                <?php foreach ($carros as $carro): ?>
                    <option value="<?= htmlspecialchars($carro->getId()); ?>">
                        <?= htmlspecialchars($carro->getModelo()) ?> (<?= htmlspecialchars($carro->getCor()) ?>)
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit" class="btn">Vender</button>
        </form>
    <?php else: ?>
        <p>Não há carros disponíveis para venda.</p>
    <?php endif; ?>
    </div>
    </div>
</body>

</html>
