<?php
require 'config/database.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM livros WHERE id = ?");
$stmt->execute([$id]);
$livro = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Livro</title>
</head>
<body>
    <h2>Editar Livro</h2>
    <form action="actions/update.php" method="POST">
        <input type="hidden" name="id" value="<?= $livro['id'] ?>">
        <label>Título:</label>
        <input type="text" name="titulo" value="<?= $livro['titulo'] ?>" required><br>
        <label>Autor:</label>
        <input type="text" name="autor" value="<?= $livro['autor'] ?>" required><br>
        <label>Ano:</label>
        <input type="number" name="ano" value="<?= $livro['ano'] ?>" required><br>
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
