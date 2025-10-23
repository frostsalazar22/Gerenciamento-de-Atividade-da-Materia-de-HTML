<?php
// Classe Aluno
class Aluno {
    private string $nome;
    private string $matricula;
    private string $curso;

    // Construtor
    public function __construct(string $nome, string $matricula, string $curso) {
        $this->nome = $nome;
        $this->matricula = $matricula;
        $this->curso = $curso;
    }

    // Getters
    public function getNome(): string {
        return $this->nome;
    }

    public function getMatricula(): string {
        return $this->matricula;
    }

    public function getCurso(): string {
        return $this->curso;
    }

    // Setters (opcional para edição)
    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function setCurso(string $curso): void {
        $this->curso = $curso;
    }
}

// Classe CadastroAlunos
class CadastroAlunos {
    private array $alunos = [];

    // Cadastrar um aluno
    public function cadastrarAluno(Aluno $aluno): string {
        foreach ($this->alunos as $a) {
            if ($a->getMatricula() === $aluno->getMatricula()) {
                return "Erro: Matrícula já cadastrada.";
            }
        }
        $this->alunos[] = $aluno;
        return "Aluno cadastrado com sucesso!";
    }

    // Listar todos os alunos
    public function listarAlunos(): void {
        if (empty($this->alunos)) {
            echo "Nenhum aluno cadastrado.\n";
            return;
        }
        foreach ($this->alunos as $aluno) {
            echo "Nome: " . $aluno->getNome() . "\n";
            echo "Matrícula: " . $aluno->getMatricula() . "\n";
            echo "Curso: " . $aluno->getCurso() . "\n";
            echo "----------------------\n";
        }
    }

    // Editar informações de um aluno
    public function editarAluno(string $matricula, string $novoNome, string $novoCurso): string {
        foreach ($this->alunos as $aluno) {
            if ($aluno->getMatricula() === $matricula) {
                $aluno->setNome($novoNome);
                $aluno->setCurso($novoCurso);
                return "Informações do aluno atualizadas com sucesso!";
            }
        }
        return "Erro: Aluno não encontrado.";
    }

    // Excluir um aluno
    public function excluirAluno(string $matricula): string {
        foreach ($this->alunos as $index => $aluno) {
            if ($aluno->getMatricula() === $matricula) {
                unset($this->alunos[$index]);
                $this->alunos = array_values($this->alunos); // Reindexar o array
                return "Aluno excluído com sucesso!";
            }
        }
        return "Erro: Aluno não encontrado.";
    }
}

// Script de teste
$cadastro = new CadastroAlunos();

// Criando alunos
$aluno1 = new Aluno("João Silva", "12345", "Engenharia");
$aluno2 = new Aluno("Maria Souza", "67890", "Direito");

// Cadastro de alunos: Permite adicionar novos alunos com nome, matrícula e curso, garantindo que a matrícula seja única.
echo $cadastro->cadastrarAluno($aluno1) . "\n";
echo $cadastro->cadastrarAluno($aluno2) . "\n";

// Listagem de alunos: Exibe a lista de todos os alunos cadastrados com suas informações.
echo "\nLista de Alunos:\n";
$cadastro->listarAlunos();

// Edição e exclusão: Permite atualizar as informações de um aluno ou removê-lo usando sua matrícula.
echo $cadastro->editarAluno("12345", "João Pereira", "Arquitetura") . "\n";
echo $cadastro->excluirAluno("67890") . "\n";

// Listando alunos após edição e exclusão
echo "\nLista de Alunos Após Alterações:\n";
$cadastro->listarAlunos();



// 1. O uso de getters e setters encapsula as propriedades da classe Aluno, garantindo que apenas métodos controlados possam acessar ou modificar os dados.
// 2. A classe CadastroAlunos organiza as operações relacionadas aos alunos, como cadastro, edição e exclusão, promovendo reutilização e separação de responsabilidades.
// 3. O script final demonstra como as funções são usadas, criando um fluxo claro para adicionar, listar, editar e excluir registros.
?>