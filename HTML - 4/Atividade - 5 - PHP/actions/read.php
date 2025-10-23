<?php
require '../config/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM livros WHERE id = ?");
    $stmt->execute([$id]);
    $livro = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$livro) {
        echo "Livro não encontrado!";
        exit();
    }
} else {
    echo "ID inválido!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Livro</title>
</head>
<body>
    <h2>Detalhes do Livro</h2>
    <p><strong>ID:</strong> <?= $livro['id'] ?></p>
    <p><strong>Título:</strong> <?= $livro['titulo'] ?></p>
    <p><strong>Autor:</strong> <?= $livro['autor'] ?></p>
    <p><strong>Ano:</strong> <?= $livro['ano'] ?></p>
    <a href="../index.php">Voltar</a>
</body>
</html>
