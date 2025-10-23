<?php
require 'config/database.php';

$query = $pdo->query("SELECT * FROM livros");
$livros = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Gerenciamento de Livros</h2>
    <a href="add.php">Adicionar Livro</a>
    <table border ="1">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Ano</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($livros as $livro): ?>
            <tr>
                <td><?= $livro['id'] ?></td>
                <td><?= $livro['titulo'] ?></td>
                <td><?= $livro['autor'] ?></td>
                <td><?= $livro['ano'] ?></td>
                <td>
                    <a href="actions/read.php?id=<?= $livro['id'] ?>">Ver Detalhes</a> |
                    <a href="edit.php?id=<?= $livro['id'] ?>">Editar</a> |
                    <a href="actions/delete.php?id=<?= $livro['id'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
