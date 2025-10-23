<?php

// Exercício 1: Substituir todas as vogais por *
function substituirVogais($str) {
    return preg_replace('/[aeiouAEIOU]/', '*', $str);
}
echo "<h2>Exercício 1: Substituir todas as vogais por *</h2>";
echo substituirVogais("Olá, mundo!") . "<br>";

// Exercício 2: Verificar se um número é primo
define('QUEBRA_LINHA', '<br>');
function ehPrimo($num) {
    if ($num < 2) return false;
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) return false;
    }
    return true;
}
echo "<h2>Exercício 2: Verificar se um número é primo</h2>";
echo ehPrimo(7) ? "Primo" : "Não é primo";
echo QUEBRA_LINHA;

// Exercício 3: Inverter uma string sem strrev()
function inverterString($str) {
    $invertida = "";
    for ($i = strlen($str) - 1; $i >= 0; $i--) {
        $invertida .= $str[$i];
    }
    return $invertida;
}
echo "<h2>Exercício 3: Inverter uma string sem strrev()</h2>";
echo inverterString("Olá, mundo!") . "<br>";

// Exercício 4: Verificar se um número é positivo, negativo ou zero
function verificarNumero($num) {
    if ($num > 0) return "Positivo";
    if ($num < 0) return "Negativo";
    return "Zero";
}
echo "<h2>Exercício 4: Verificar se um número é positivo, negativo ou zero</h2>";
echo verificarNumero(-5) . "<br>";

// Exercício 5: Contar palavras e imprimir cada uma em uma nova linha
function contarPalavras($frase) {
    $palavras = explode(" ", $frase);
    echo "<h2>Exercício 5: Contar palavras e imprimir cada uma em uma nova linha</h2>";
    echo "Total de palavras: " . count($palavras) . "<br>";
    foreach ($palavras as $palavra) {
        echo $palavra . "<br>";
    }
}
contarPalavras("PHP é uma linguagem incrível");

// Exercício 6: Verificar se uma palavra é um palíndromo
function ehPalindromo($str) {
    $str = strtolower(preg_replace('/[^a-z]/', '', $str));
    return $str === strrev($str);
}
echo "<h2>Exercício 6: Verificar se uma palavra é um palíndromo</h2>";
echo ehPalindromo("radar") ? "É um palíndromo" : "Não é um palíndromo";
echo "<br>";

// Exercício 7: Imprimir números de 1 a 20, substituindo múltiplos de 3 por "Fizz"
echo "<h2>Exercício 7: Imprimir números de 1 a 20, substituindo múltiplos de 3 por 'Fizz'</h2>";
for ($i = 1; $i <= 20; $i++) {
    echo ($i % 3 == 0) ? "Fizz" : $i;
    echo "<br>";
}

// Exercício 8: Remover espaços em branco de uma string
function removerEspacos($str) {
    return str_replace(" ", "", $str);
}
echo "<h2>Exercício 8: Remover espaços em branco de uma string</h2>";
echo removerEspacos("Olá, mundo!") . "<br>";

// Exercício 9: Imprimir os 10 primeiros números da sequência de Fibonacci
function fibonacci($termos) {
    $fibo = [0, 1];
    for ($i = 2; $i < $termos; $i++) {
        $fibo[] = $fibo[$i - 1] + $fibo[$i - 2];
    }
    return implode(", ", $fibo);
}
echo "<h2>Exercício 9: Imprimir os 10 primeiros números da sequência de Fibonacci</h2>";
echo fibonacci(10) . "<br>";

// Exercício 10: Verificar se um texto é um pangrama
function ehPangrama($texto) {
    $alfabeto = range('a', 'z');
    $texto = strtolower(preg_replace('/[^a-z]/', '', $texto));
    foreach ($alfabeto as $letra) {
        if (strpos($texto, $letra) === false) return "Não é um pangrama";
    }
    return "É um pangrama";
}
echo "<h2>Exercício 10: Verificar se um texto é um pangrama</h2>";
echo ehPangrama("The quick brown fox jumps over the lazy dog");

?>
