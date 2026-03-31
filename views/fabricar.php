<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricar Carro</title>
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

        <?php if (!empty($_SESSION['mensagem'])): ?>
            <div class="mensagem <?php echo htmlspecialchars($_SESSION['mensagem_tipo']); ?>">
                <?php echo $_SESSION['mensagem']; unset($_SESSION['mensagem']); unset($_SESSION['mensagem_tipo']); ?>
            </div>
        <?php endif; ?>

        <div class="card">
            <h2>Fabricar carro</h2>

            <form method="post" class="formulario">
                <label for="modelo">Modelo</label>
                <input type="text" id="modelo" name="modelo" required>

                <label for="cor">Cor</label>
                <input type="text" id="cor" name="cor" required>

                <button type="submit">Fabricar</button>
            </form>
        </div>
    </div>
</body>

</html>
