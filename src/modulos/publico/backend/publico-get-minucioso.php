<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$usu_id = $_SESSION['user_id'];
$mesAtual = date('m');
$anoAtual = date('Y');

//pegar controle
$sqlControle = "SELECT plano_contas, limite    
                FROM minucioso
                WHERE usu_id = $usu_id
                AND MONTH(data) = $mesAtual
                AND YEAR(data) = $anoAtual";

$queryCotrole = prepareAll($sqlControle);

$controle = $queryCotrole->data;

$planoContas = [];

foreach($controle as $item) {
    $planoContas[] = $item->plano_contas;
}

$planoContasList = "'" . implode("', '", $planoContas) . "'";

//pegar despesas referente ao controle
$sqlDespesas = "SELECT plano_contas, SUM(valor) total_gasto
                FROM movimentacoes
                WHERE usu_id = $usu_id
                AND MONTH(data) = $mesAtual
                AND YEAR(data) = $anoAtual
                AND plano_contas IN ($planoContasList)
                AND tipo = 1
                GROUP BY plano_contas";

$queryDespesas = prepareAll($sqlDespesas);

$despesas = $queryDespesas->data;

$resultado = [];

foreach ($controle as $item) {
    
    $plano = $item->plano_contas;
    $limite = (float) $item->limite;

    $totalGasto = 0;

    foreach ($despesas as $despesa) {
        if ($despesa->plano_contas === $plano) {
            $totalGasto = (float) $despesa->total_gasto;
            break;
        }
    }

    $percentualGasto = ($limite > 0) ? min(($totalGasto / $limite) * 100, 100) : 0;

    $resultado[] = [
        'plano_contas' => $plano,
        'limite' => $limite,
        'total_gasto' => $totalGasto,
        'percentual_gasto' => $percentualGasto
    ];
}

response([
    'status' => true,
    'controle_minucioso' => $resultado
]);
