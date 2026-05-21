<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Produtos Vulnerável</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h1>Pesquisa de Produtos - Vulnerável</h1>
<p><a href="index.php">Voltar</a></p>

<form method="GET">
    <input type="text" name="busca" placeholder="Digite o nome do produto">
    <button type="submit">Pesquisar</button>
</form>

<?php
if (isset($_GET["busca"])) {

    $busca = $_GET["busca"];

    // QUERY SEGURA
    $sql = "SELECT id, nome, categoria, preco 
            FROM produtos 
            WHERE nome LIKE ?";

    $stmt = $conn->prepare($sql);

    $parametro = "%{$busca}%";

    $stmt->bind_param("s", $parametro);

    $stmt->execute();

    $resultado = $stmt->get_result();

    echo "<h3>SQL preparado:</h3>";
    echo "<pre class='codigo'>" . htmlspecialchars($sql) . "</pre>";

    if ($resultado && $resultado->num_rows > 0) {

        echo "<table>";
        echo "<tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Categoria</th>
                <th>Preço</th>
              </tr>";

        while ($linha = $resultado->fetch_assoc()) {

            echo "<tr>";
            echo "<td>{$linha['id']}</td>";
            echo "<td>" . htmlspecialchars($linha['nome']) . "</td>";
            echo "<td>" . htmlspecialchars($linha['categoria']) . "</td>";
            echo "<td>R$ {$linha['preco']}</td>";
            echo "</tr>";
        }

        echo "</table>";

    } else {

        echo "<div class='resultado erro'>Nenhum produto encontrado.</div>";
    }

    $stmt->close();
}
?>

<h2>Testes didáticos</h2>
<pre class="codigo">' OR '1'='1' #
%' OR '1'='1' #
%' UNION SELECT id, nome, email, perfil FROM usuarios #</pre>
</div>
</body>
</html>
