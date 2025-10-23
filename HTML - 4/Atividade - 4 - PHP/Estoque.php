<?php
class Estoque {
    private array $produtos = [];

    public function adicionarProduto(Produto $produto) {
        $this->produtos[] = $produto;
    }

    public function listarProdutos(): array {
        return $this->produtos;
    }

    public function calcularValorTotal(): float {
        $total = 0;
        foreach ($this->produtos as $produto) {
            $total += $produto->getPreco() * $produto->getQuantidade();
        }
        return $total;
    }

    public function removerProduto(string $nomeProduto) {
        foreach ($this->produtos as $index => $produto) {
            if (method_exists($produto, 'exibirInfo') && strpos($produto->exibirInfo(), $nomeProduto) !== false) {
                unset($this->produtos[$index]);
            }
        }
        $this->produtos = array_values($this->produtos);
    }
}
?>
