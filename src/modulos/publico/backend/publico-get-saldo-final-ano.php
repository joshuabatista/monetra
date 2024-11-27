<?php
require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$usu_id = $_SESSION['user_id'];

$anoAtual = date('Y');

$saldosFinais = [];

for ($mes = 1; $mes <= 12; $mes++) {
    // Saldo inicial
    $sqlInicial = "SELECT sum(valor)
                    FROM movimentacoes
                    WHERE usu_id = ?
                    AND cartao_credito = '0'
                    AND categoria = 'Inicial'
                    AND YEAR(data) = ?
                    AND MONTH(data) = ?";
    $queryInicial = prepareAll($sqlInicial, [$usu_id, $anoAtual, $mes]);
    $inicial = $queryInicial->data;
    $valorInicial = (float)($inicial[0]->{'sum(valor)'} ?? 0);

    // Saídas
    $sqlSaidas = "SELECT sum(valor)
                  FROM movimentacoes
                  WHERE usu_id = ?
                  AND tipo = 1
                  AND cartao_credito = '0'
                  AND YEAR(data) = ?
                  AND MONTH(data) = ?";
    $querySaidas = prepareAll($sqlSaidas, [$usu_id, $anoAtual, $mes]);
    $saidas = $querySaidas->data;
    $valorSaidas = (float)($saidas[0]->{'sum(valor)'} ?? 0);

    // Entradas
    $sqlEntradas = "SELECT sum(valor)
                    FROM movimentacoes
                    WHERE usu_id = ?
                    AND tipo = 2
                    AND cartao_credito = '0'
                    AND YEAR(data) = ?
                    AND MONTH(data) = ?";
    $queryEntradas = prepareAll($sqlEntradas, [$usu_id, $anoAtual, $mes]);
    $entradas = $queryEntradas->data;
    $valorEntradas = (float)($entradas[0]->{'sum(valor)'} ?? 0);

    // Calcula o saldo final do mês
    $saldoFinal = $valorInicial + $valorEntradas - $valorSaidas;

    $saldosFinais[] = [
        'mes' => date('F', mktime(0, 0, 0, $mes, 10)), 
        'saldoFinal' => $saldoFinal
    ];
}

response([
    'status' => true,
    'data' => $saldosFinais
]);