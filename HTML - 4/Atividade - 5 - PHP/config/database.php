<?php
$host = "localhost";
$dbname = "biblioteca";
$user = "root"; // Altere conforme necessário
$pass = "";     // Coloque sua senha do MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>
