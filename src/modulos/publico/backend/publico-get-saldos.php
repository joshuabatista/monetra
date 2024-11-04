<?php
require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$usu_id = $_SESSION['user_id'];
$periodo = $_GET['periodo'] ?? null;
$dataAtual = new DateTime();

if (!empty($periodo)) {
    $dataAtual = new DateTime($periodo);
}

// Calcula o primeiro e o último dia do mês atual
$primeiroDiaMes = $dataAtual->format('Y-m-01');
$ultimoDiaMes = $dataAtual->format('Y-m-t');

// Calcula o primeiro e o último dia do mês anterior
$primeiroDiaMesAnterior = (clone $dataAtual)->modify('-1 month')->format('Y-m-01');
$ultimoDiaMesAnterior = (clone $dataAtual)->modify('-1 month')->format('Y-m-t');

// Verificar se existe um saldo inicial cadastrado
$sqlInicial = "SELECT valor AS saldo_inicial 
                FROM movimentacoes 
                WHERE usu_id = ? AND categoria = 'Inicial'
                ORDER BY data ASC LIMIT 1";

$queryInicial = prepareAll($sqlInicial, [$usu_id]);
$saldoInicialCheck = $queryInicial->data[0]->saldo_inicial ?? 0;

// Verificar saldo final do mês anterior para usá-lo como saldo inicial do mês atual
$sqlSaldoFinalMesAnterior = "SELECT (
                                SUM(CASE WHEN tipo = '2' THEN valor ELSE 0 END) +
                                 SUM(CASE WHEN categoria = 'Inicial' THEN valor ELSE 0 END) -
                                SUM(CASE WHEN tipo = '1' THEN valor ELSE 0 END)
                            ) AS saldo_final
                            FROM movimentacoes 
                            WHERE usu_id = ? 
                            AND cartao_credito = '0'
                            AND data BETWEEN '2024-01-01' AND ?";

$querySaldoFinalAnterior = prepareAll($sqlSaldoFinalMesAnterior, [$usu_id, $ultimoDiaMesAnterior]);

// echo '<pre>';
// die(var_dump($querySaldoFinalAnterior));
// echo '</pre>';

$saldoFinalAnterior = $querySaldoFinalAnterior->data[0]->saldo_final;


// Calcular entradas do mês atual
$sqlEntradas = "SELECT SUM(valor) AS entradas 
    FROM movimentacoes 
    WHERE usu_id = ? 
      AND tipo = '2' 
      AND cartao_credito = '0'
      AND data BETWEEN ? AND ?";

$queryEntradas = prepareAll($sqlEntradas, [$usu_id, $primeiroDiaMes, $ultimoDiaMes]);
$entradas = $queryEntradas->data[0]->entradas ?? 0;



// Calcular saídas do mês atual
$sqlSaidas = "SELECT SUM(valor) AS saidas 
    FROM movimentacoes 
    WHERE usu_id = ? 
      AND tipo = '1' 
      AND cartao_credito = '0'
      AND data BETWEEN ? AND ?";

$querySaidas = prepareAll($sqlSaidas, [$usu_id, $primeiroDiaMes, $ultimoDiaMes]);
$saidas = $querySaidas->data[0]->saidas ?? 0;


// Definindo o saldo inicial do mês atual
$saldoInicial = ($saldoFinalAnterior !== null) ? $saldoFinalAnterior : $saldoInicialCheck ;

// Calcular saldo final do mês atual
$saldoFinal = ($saldoInicial + $entradas) - $saidas;

// Retornar os dados para o frontend
response([
    'status' => true,
    'data' => [
        'saldo_inicial' => number_format($saldoInicial, 2, ',', '.'),
        'entradas' => number_format($entradas, 2, ',', '.'),
        'saidas' => number_format($saidas, 2, ',', '.'),
        'saldo_final' => number_format($saldoFinal, 2, ',', '.')
    ]
]);
