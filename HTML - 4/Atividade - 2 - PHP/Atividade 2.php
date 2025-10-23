<?php
$arquivo = "notas.txt";

// Função para registrar aluno e nota no arquivo
function registrarAluno($nome, $nota)
{
    global $arquivo;
    if ($nota < 0 || $nota > 10) {
        echo "Nota inválida! Deve estar entre 0 e 10.";
        return;
    }
    $handle = fopen($arquivo, "a"); // Modo append
    fwrite($handle, "$nome,$nota\n");
    fclose($handle);
    echo "Aluno registrado com sucesso!<br>";
}

// Função para listar alunos e notas
function listarAlunos()
{
    global $arquivo;
    if (!file_exists($arquivo) || filesize($arquivo) == 0) {
        echo "Nenhum aluno registrado.<br>";
        return;
    }
    $conteudo = file_get_contents($arquivo);
    $linhas = explode("\n", trim($conteudo));
    echo "<strong>Lista de Alunos e Notas:</strong><br>";
    foreach ($linhas as $linha) {
        list($nome, $nota) = explode(",", $linha);
        echo "$nome - Nota: $nota<br>";
    }
}

// Função para calcular a média das notas
function calcularMedia()
{
    global $arquivo;
    if (!file_exists($arquivo) || filesize($arquivo) == 0) {
        echo "Nenhuma nota disponível para calcular a média.<br>";
        return;
    }
    $conteudo = file_get_contents($arquivo);
    $linhas = explode("\n", trim($conteudo));
    $soma = 0;
    $total = count($linhas);
    foreach ($linhas as $linha) {
        list($nome, $nota) = explode(",", $linha);
        $soma += $nota;
    }
    $media = $soma / $total;
    echo "<strong>Média das Notas:</strong> " . number_format($media, 2) . "<br>";
}

// Função para excluir todas as notas
function excluirNotas()
{
    global $arquivo;
    file_put_contents($arquivo, "");
    echo "Todas as notas foram excluídas!<br>";
}



// Função para editar a nota de um aluno
function editarNota($nome_aluno, $nova_nota)
{
    global $arquivo;
    if ($nova_nota < 0 || $nova_nota > 10) {
        echo "Nota inválida! Deve estar entre 0 e 10.";
        return;
    }
    if (!file_exists($arquivo) || filesize($arquivo) == 0) {
        echo "Nenhum aluno registrado.<br>";
        return;
    }
    $conteudo = file_get_contents($arquivo);
    $linhas = explode("\n", trim($conteudo));
    $novo_conteudo = "";
    foreach ($linhas as $linha) {
        list($nome, $nota) = explode(",", $linha);
        if ($nome == $nome_aluno) {
            $linha = "$nome_aluno,$nova_nota";
        }
        $novo_conteudo .= $linha . "\n";
    }
    file_put_contents($arquivo, trim($novo_conteudo));
    echo "Nota de $nome_aluno atualizada para $nova_nota!<br>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["registrar"])) {
        registrarAluno($_POST["nome"], $_POST["nota"]);
    } elseif (isset($_POST["excluir"])) {
        excluirNotas();
    } elseif (isset($_POST["editar"])) {
        editarNota($_POST["nome_edit"], $_POST["nota_edit"]);
    }
}

?>


<!DOCTYPE html><html>
<head>
    <title>Registro de Notas</title>
</head>
<body>
    <h2>Registrar Aluno</h2>
    <form method="post">
        Nome: <input type="text" name="nome" required>
        Nota: <input type="number" name="nota" min="0" max="10" required>
        <button type="submit" name="registrar">Registrar</button>
    </form><h2>Editar Nota</h2>
<form method="post">
    Nome do Aluno: <input type="text" name="nome_edit" required>
    Nova Nota: <input type="number" name="nota_edit" min="0" max="10" required>
    <button type="submit" name="editar">Editar</button>
</form>

<h2>Excluir Todas as Notas</h2>
<form method="post">
    <button type="submit" name="excluir">Excluir Notas</button>
</form>

<h2>Lista de Alunos e Média</h2>

<?php listarAlunos(); calcularMedia(); ?>

</body>
</html>