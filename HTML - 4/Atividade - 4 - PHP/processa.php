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

// Redireciona de volta para index.php após processar
header("Location: index.php");
exit();
