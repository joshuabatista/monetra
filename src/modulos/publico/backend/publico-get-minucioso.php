<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$usu_id = $_SESSION['user_id'];
$filtro = $_GET['filtro'];

$mesAtual = date('m');
$anoAtual = date('Y');

if(!empty($filtro)) {

    list($ano, $mes) = explode('-', $filtro);    

    $mesAtual = $mes;
    $anoAtual = $ano;
}



//pegar controle
$sqlControle = "SELECT m.plano_contas, pc.descricao, m.limite    
                FROM minucioso m
                JOIN plano_contas_analitico pc ON pc.codigo = m.plano_contas
                WHERE m.usu_id = $usu_id
                AND MONTH(m.data) = $mesAtual
                AND YEAR(m.data) = $anoAtual";

$queryCotrole = prepareAll($sqlControle);

$controle = $queryCotrole->data;

$planoContas = [];

foreach($controle as $item) {
    $planoContas[] = $item->plano_contas;
}

$planoContasList = "'" . implode("', '", $planoContas) . "'";

//pegar despesas referente ao controle
$sqlDespesas = "SELECT m.plano_contas, pc.descricao, SUM(m.valor) total_gasto
                FROM movimentacoes m
                JOIN plano_contas_analitico pc ON pc.codigo = m.plano_contas
                WHERE m.usu_id = $usu_id
                AND MONTH(m.data) = $mesAtual
                AND YEAR(m.data) = $anoAtual
                AND m.plano_contas IN ($planoContasList)
                AND m.tipo = 1
                GROUP BY m.plano_contas";

$queryDespesas = prepareAll($sqlDespesas);

$despesas = $queryDespesas->data;

$resultado = [];

foreach ($controle as $item) {
    
    $plano = $item->plano_contas;
    $limite = (float) $item->limite;
    $descicao = $item->descricao;

    $totalGasto = 0;

    foreach ($despesas as $despesa) {
        if ($despesa->plano_contas === $plano) {
            $totalGasto = (float) $despesa->total_gasto;
            break;
        }
    }

    $percentualGasto = ($limite > 0) ? min(round(($totalGasto / $limite) * 100, 2), 100) : 0;


    $resultado[] = [
        'plano_contas' => $plano,
        'descricao' => $descicao,
        'limite' => $limite,
        'total_gasto' => $totalGasto,
        'percentual_gasto' => $percentualGasto
    ];
}

response([
    'status' => true,
    'controle_minucioso' => $resultado
]);
