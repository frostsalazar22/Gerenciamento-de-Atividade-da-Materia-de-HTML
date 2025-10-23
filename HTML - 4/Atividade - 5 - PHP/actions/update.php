<?php
require '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano = $_POST['ano'];

    $stmt = $pdo->prepare("UPDATE livros SET titulo=?, autor=?, ano=? WHERE id=?");
    $stmt->execute([$titulo, $autor, $ano, $id]);

    header("Location: ../index.php");
    exit();
}
?>
