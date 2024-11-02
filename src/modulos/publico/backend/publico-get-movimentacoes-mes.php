<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

date_default_timezone_set('America/Sao_Paulo');

$usu_id = $_SESSION['user_id'];

$mesAtual = date('m');
$anoAtual = date('Y');

// Consulta para obter as movimentações
$sqlMovimentacoes = "SELECT pc.descricao, m.*    
        FROM movimentacoes m
        JOIN plano_contas_analitico pc ON pc.codigo = m.plano_contas
        WHERE m.usu_id = $usu_id AND m.tipo IN ('1', '2')
        AND MONTH(m.data) = $mesAtual 
        AND YEAR(m.data) = $anoAtual";

$queryMovimentacoes = prepareAll($sqlMovimentacoes);

$movimentacoes = $queryMovimentacoes->data;

$sqlSomaEntradasPorDia = "SELECT DAY(m.data) AS dia, 
                                  FORMAT(SUM(m.valor), 2, 'de_DE') AS somaEntrada    
                           FROM movimentacoes m
                           WHERE m.usu_id = $usu_id AND m.tipo = '2'
                           AND MONTH(m.data) = $mesAtual 
                           AND YEAR(m.data) = $anoAtual
                           GROUP BY dia";

$queryEntradasPorDia = prepareAll($sqlSomaEntradasPorDia);

$somaEntradasPorDia = $queryEntradasPorDia->data;

$sqlSomaSaidasPorDia = "SELECT DAY(m.data) AS dia, 
                               FORMAT(SUM(m.valor), 2, 'de_DE') AS somaSaida    
                        FROM movimentacoes m
                        WHERE m.usu_id = $usu_id AND m.tipo = '1'
                        AND MONTH(m.data) = $mesAtual 
                        AND YEAR(m.data) = $anoAtual
                        GROUP BY dia";

$querySaidasPorDia = prepareAll($sqlSomaSaidasPorDia);

$somaSaidasPorDia = $querySaidasPorDia->data;

response([
    'status' => true,
    'movimentacoes' => $movimentacoes,
    'somaEntradasPorDia' => $somaEntradasPorDia,
    'somaSaidasPorDia' => $somaSaidasPorDia
]);
