<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Livro</title>
</head>
<body>
    <h2>Adicionar Livro</h2>
    <form action="actions/create.php" method="POST">
        <label>Título:</label>
        <input type="text" name="titulo" required><br>
        <label>Autor:</label>
        <input type="text" name="autor" required><br>
        <label>Ano:</label>
        <input type="number" name="ano" required><br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
