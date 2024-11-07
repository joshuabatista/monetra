<?php
require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$usu_id = $_SESSION['user_id'];
$dataAtual = new DateTime();

$ano = $dataAtual->format('Y');
$primeiroMesAno = $dataAtual->format('Y') . '-01';
$ultimoDiaAnoAnterior = (clone $dataAtual)->modify('last day of December last year')->format('Y-m-d');

// // Verificar se existe um saldo inicial cadastrado
$sqlInicial = "SELECT valor AS saldo_inicial 
                FROM movimentacoes 
                WHERE usu_id = ? AND categoria = 'Inicial'
                ORDER BY data ASC LIMIT 1";

$queryInicial = prepareAll($sqlInicial, [$usu_id]);
$saldoInicialCheck = $queryInicial->data[0]->saldo_inicial ?? 0;



// // Verificar saldo final do ano anterior
$sqlSaldoFinalAnoAnteior = "SELECT (
                                SUM(CASE WHEN tipo = '2' THEN valor ELSE 0 END) +
                                 SUM(CASE WHEN categoria = 'Inicial' THEN valor ELSE 0 END) -
                                SUM(CASE WHEN tipo = '1' THEN valor ELSE 0 END)
                            ) AS saldo_final
                            FROM movimentacoes 
                            WHERE usu_id = ? 
                            AND cartao_credito = '0'
                            AND data BETWEEN '2000-01-01' AND ?";

$querySaldoFinalAnterior = prepareAll($sqlSaldoFinalAnoAnteior, [$usu_id, $ultimoDiaAnoAnterior]);

$saldoFinalAnterior = $querySaldoFinalAnterior->data[0]->saldo_final;

// // Calcular entradas do ano atual
$sqlEntradas = "SELECT SUM(valor) AS entradas 
    FROM movimentacoes 
    WHERE usu_id = ? 
      AND tipo = '2' 
      AND cartao_credito = '0'
      AND YEAR(data) = ?";

$queryEntradas = prepareAll($sqlEntradas, [$usu_id, $ano]);

$entradas = $queryEntradas->data[0]->entradas ?? 0;


// // Calcular saídas do ano atual
$sqlSaidas = "SELECT SUM(valor) AS saidas 
    FROM movimentacoes 
    WHERE usu_id = ? 
      AND tipo = '1' 
      AND cartao_credito = '0'
      AND YEAR(data) = ?";

$querySaidas = prepareAll($sqlSaidas, [$usu_id, $ano]);

$saidas = $querySaidas->data[0]->saidas ?? 0;


// // Definindo o saldo inicial do ano atual
$saldoInicial = ($saldoFinalAnterior !== null) ? $saldoFinalAnterior : $saldoInicialCheck ;

// Calcular saldo final do mês atual
$saldoFinal = ($saldoInicial + $entradas) - $saidas;

//calcular o total de entradas por mes do ano atual
$sqlEntradasPorMes = "SELECT MONTH(data) AS mes, SUM(valor) AS total_entradas
                        FROM movimentacoes
                        WHERE usu_id = ? 
                        AND tipo = '2' 
                        AND cartao_credito = '0'
                        AND YEAR(data) = ?
                        GROUP BY MONTH(data)
                        ORDER BY MONTH(data)
";

$queryEntradasPorMes = prepareAll($sqlEntradasPorMes, [$usu_id, $ano]);

$entradasPorMes = $queryEntradasPorMes->data ?? [];

$sqlSaidasPorMes = "SELECT MONTH(data) AS mes, SUM(valor) AS total_saidas
                        FROM movimentacoes
                        WHERE usu_id = ? 
                        AND tipo = '1' 
                        AND cartao_credito = '0'
                        AND YEAR(data) = ?
                        GROUP BY MONTH(data)
                        ORDER BY MONTH(data)
";

$querySaidasPorMes = prepareAll($sqlSaidasPorMes, [$usu_id, $ano]);

$saidasPorMes = $querySaidasPorMes->data ?? [];

response([
    'status' => true,
    'data' => [
        'saldo_inicial' => number_format($saldoInicial, 2, ',', '.'),
        'entradas' => number_format($entradas, 2, ',', '.'),
        'saidas' => number_format($saidas, 2, ',', '.'),
        'saldo_final' => number_format($saldoFinal, 2, ',', '.'),
        'entradas_mensal' => $entradasPorMes,
        'saidas_mensal' => $saidasPorMes,
    ]
]);
