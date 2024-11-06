<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

date_default_timezone_set('America/Sao_Paulo');

$usu_id = $_SESSION['user_id'];

$dataInput = $_GET['dataInput'];

$hoje = date('Y/m/d');

if(!empty($dataInput)) {
    $hoje = $dataInput;
}

// dd($hoje);

$sqlEntradas = "SELECT pc.descricao, m.*
                FROM movimentacoes m
                JOIN plano_contas_analitico pc ON pc.codigo = m.plano_contas
                where DATA = '{$hoje}' AND m.categoria = 'Receita' AND m.tipo = '2' AND m.usu_id = $usu_id";

$queryEntradas = prepareAll($sqlEntradas);

$entradas = $queryEntradas->data;

$sqlSaidas = "SELECT pc.descricao, m.*
            FROM movimentacoes m
            JOIN plano_contas_analitico pc ON pc.codigo = m.plano_contas
            where DATA = '{$hoje}' AND m.categoria = 'Despesa' AND m.tipo = '1' AND m.usu_id = $usu_id";

$querySaidas = prepareAll($sqlSaidas);

$saidas = $querySaidas->data;

$sqlSomaEntradas = "SELECT SUM(m.valor) somaEntradas
                    FROM movimentacoes m
                    where DATA = '{$hoje}' AND m.categoria = 'Receita' AND m.tipo = '2' AND m.usu_id = $usu_id";

$querySomaEntradas = prepareAll($sqlSomaEntradas);

$entradasSoma = $querySomaEntradas->data;

$sqlSomaSaidas = "SELECT SUM(m.valor) somaSaidas
                  FROM movimentacoes m
                  where DATA = '{$hoje}' AND m.categoria = 'Despesa' AND m.tipo = '1' AND m.usu_id = $usu_id";

$querySomaSaidas = prepareAll($sqlSomaSaidas);

$saidasSoma = $querySomaSaidas->data;

response([
    'status'=>true,
    'entradas'=>$entradas,
    'saidas'=>$saidas,
    'somaEntradas'=>$entradasSoma,
    'somaSaidas'=>$saidasSoma
]);