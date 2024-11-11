<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$usu_id = $_SESSION['user_id'];
$mesAtual = date('m');
$anoAtual = date('Y');

// Query para a soma total das despesas
$sqlSoma = "SELECT SUM(valor) AS soma
            FROM movimentacoes
            WHERE usu_id = $usu_id
            AND tipo = '1'
            AND cartao_credito = '0'
            AND MONTH(data) = $mesAtual
            AND YEAR(data) = $anoAtual";

$querySoma = prepareAll($sqlSoma);

if (!empty($querySoma->exeption)) {
    response([
        'status' => false,
        'message' => 'Erro na consulta de dados, contate o suporte [001]'
    ]);
}

$soma = $querySoma->data[0]->soma ?? 0;

// Query para obter as despesas individuais
$sqlDespesas = "SELECT pc.descricao, m.valor
                FROM movimentacoes m
                JOIN plano_contas_analitico pc ON pc.codigo = m.plano_contas
                WHERE m.usu_id = $usu_id
                AND m.cartao_credito = '0'
                AND m.tipo = '1'
                AND MONTH(m.data) = $mesAtual
                AND YEAR(m.data) = $anoAtual";
                
$queryDespesas = prepareAll($sqlDespesas);


if (!empty($queryDespesas->exeption)) {
    response([
        'status' => false,
        'message' => 'Erro na consulta de dados, contate o suporte [001]'
    ]);
}

// Converte o valor de cada despesa para float
$despesas = array_map(function($despesa) {
    $despesa->valor = (float) $despesa->valor; 
    return $despesa;
}, $queryDespesas->data);

response([
    'status' => true,
    'total_despesas' => (float) $soma, 
    'despesas' => $despesas
]);
