<?php
class Produto {
    private string $nome;
    private float $preco;
    private int $quantidade;
    private string $categoria;

    public function __construct(string $nome, float $preco, int $quantidade, string $categoria) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
        $this->categoria = $categoria;
    }

    public function exibirInfo(): string {
        return "{$this->nome} - R$ {$this->preco} ({$this->quantidade} em estoque) - Categoria: {$this->categoria}";
    }

    public function aplicarDesconto(float $percentual) {
        $this->preco -= $this->preco * ($percentual / 100);
    }

    public function atualizarQuantidade(int $novaQuantidade) {
        $this->quantidade = $novaQuantidade;
    }

    public function getPreco(): float {
        return $this->preco;
    }

    public function getQuantidade(): int {
        return $this->quantidade;
    }

    public function getCategoria(): string {
        return $this->categoria;
    }
}
?>
