<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$usu_id = $_SESSION['user_id'];

// primeiro e ultimo dia do mes atual
$dataAtual = new DateTime();
$primeiroDiaMes = $dataAtual->format('Y-m-01');
$ultimoDiaMes = $dataAtual->format('Y-m-t');

// saldo inicial do mes atual
$sqlSaldoInicial = "SELECT valor AS saldo_inicial FROM movimentacoes 
                    WHERE usu_id = ? AND categoria = 'Inicial'
                    ORDER BY data ASC LIMIT 1";

$querySaldoInicial = prepareAll($sqlSaldoInicial, [$usu_id]);

$saldoInicial = $querySaldoInicial->data[0]->saldo_inicial ?? 0;

// Se houver um saldo final do mês anterior, usar como saldo inicial
$sqlSaldoFinalMesAnterior = "SELECT (SUM(CASE WHEN tipo = '2' THEN valor ELSE 0 END) - SUM(CASE WHEN tipo = '1' THEN valor ELSE 0 END)) AS saldo_final
                             FROM movimentacoes 
                             WHERE usu_id = ? 
                             AND data BETWEEN DATE_SUB(?, INTERVAL 1 MONTH) 
                             AND LAST_DAY(DATE_SUB(?, INTERVAL 1 MONTH))";

$querySaldoFinalAnterior = prepareAll($sqlSaldoFinalMesAnterior, [$usu_id, $primeiroDiaMes, $primeiroDiaMes]);

$saldoFinalAnterior = $querySaldoFinalAnterior->data[0]->saldo_final ?? 0;

if ($saldoFinalAnterior != 0) {
    $saldoInicial = $saldoFinalAnterior;
}

// Calcular entradas do mes atual
$sqlEntradas = "SELECT SUM(valor) AS entradas FROM movimentacoes 
                WHERE usu_id = ? AND tipo = '2' 
                AND data BETWEEN ? AND ?";

$queryEntradas = prepareAll($sqlEntradas, [$usu_id, $primeiroDiaMes, $ultimoDiaMes]);

$entradas = $queryEntradas->data[0]->entradas ?? 0;

//Calcular saídas do mês atual
$sqlSaidas = "SELECT SUM(valor) AS saidas FROM movimentacoes 
              WHERE usu_id = ? AND tipo = '1' 
              AND data BETWEEN ? AND ?";

$querySaidas = prepareAll($sqlSaidas, [$usu_id, $primeiroDiaMes, $ultimoDiaMes]);

$saidas = $querySaidas->data[0]->saidas ?? 0;

// Calcular saldo final
$saldoFinal = $saldoInicial + $entradas - $saidas;

response([
    'status' => true,
    'data' => [
        'saldo_inicial' => number_format($saldoInicial, 2, ',', '.'),
        'entradas' => number_format($entradas, 2, ',', '.'),
        'saidas' => number_format($saidas, 2, ',', '.'),
        'saldo_final' => number_format($saldoFinal, 2, ',', '.')
    ]
]);
