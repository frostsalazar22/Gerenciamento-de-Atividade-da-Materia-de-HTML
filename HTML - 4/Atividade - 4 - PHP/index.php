<?php
require_once 'Produto.php';
require_once 'Estoque.php';

session_start();

// Inicializa o estoque se não existir
if (!isset($_SESSION['estoque'])) {
    $_SESSION['estoque'] = new Estoque();
}

$estoque = $_SESSION['estoque'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nome']) && isset($_POST['preco']) && isset($_POST['quantidade']) && isset($_POST['categoria'])) {
        $produto = new Produto($_POST['nome'], floatval($_POST['preco']), intval($_POST['quantidade']), $_POST['categoria']);
        $estoque->adicionarProduto($produto);
        $_SESSION['estoque'] = $estoque;
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Produtos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 600px; margin: auto; }
        input, select, button { margin: 5px 0; display: block; width: 100%; padding: 8px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Adicionar Produto</h2>
        <form action="" method="post">
            <input type="text" name="nome" placeholder="Nome do Produto" required>
            <input type="number" name="preco" step="0.01" placeholder="Preço" required>
            <input type="number" name="quantidade" placeholder="Quantidade" required>
            <select name="categoria">
                <option value="Eletrônicos">Eletrônicos</option>
                <option value="Roupas">Roupas</option>
                <option value="Alimentos">Alimentos</option>
            </select>
            <button type="submit">Adicionar Produto</button>
        </form>

        <h2>Estoque Atual</h2>
        <ul>
            <?php foreach ($estoque->listarProdutos() as $produto): ?>
                <li><?= $produto->exibirInfo(); ?></li>
            <?php endforeach; ?>
        </ul>

        <h3>Valor Total do Estoque: R$ <?= number_format($estoque->calcularValorTotal(), 2, ',', '.'); ?></h3>
    </div>
</body>
</html>
