<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>

    <link rel="stylesheet" href="css/cadastro.css">
</head>
<body>

<div class="cadastro-box">

    <h2>Criar Conta</h2>

    <form action="salvar.php" method="POST">

        <input type="text" name="nome" placeholder="Nome" required>

        <input type="email" name="email" placeholder="E-mail" required>

        <input type="password" name="senha" placeholder="Senha" required>

        <input type="password" name="confirmar" placeholder="Confirmar senha" required>

        <button type="submit">Cadastrar</button>

    </form>

    <a href="index.php">Já tenho conta</a>

</div>

</body>
</html>