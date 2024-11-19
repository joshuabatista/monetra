<?php
require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$usu_id = $_SESSION['user_id'];

// SQL para pegar o cartão com seu limite
$sqlCartoes = "SELECT id, cartao, limite 
                FROM cartao_credito
                WHERE usu_id = ?";

$queryCartoes = prepareAll($sqlCartoes, [$usu_id]);
$cartoes = $queryCartoes->data;

// SQL para pegar o saldo inicial do cartão, aquilo que já foi consumido
$sqlLimiteConsumido = "SELECT id, limite_consumido
                        FROM cartao_credito
                        WHERE usu_id = ?";

$queryLimiteConsumido = prepareAll($sqlLimiteConsumido, [$usu_id]);
$limiteConsumido = $queryLimiteConsumido->data;

// SQL para pegar a soma das despesas de cada cartão
$sqlSomaDespesa = "SELECT m.id_cartao,
                        SUM(CASE WHEN m.cartao_credito = '1' AND m.tipo = 1 THEN m.valor 
                                ELSE 0 
                            END) AS total_valor
                    FROM movimentacoes m
                    WHERE usu_id = ?
                    AND m.cartao_credito IS NOT NULL
                    AND m.cartao_credito = '1'
                    GROUP BY m.id_cartao";

$querySomaDespesas = prepareAll($sqlSomaDespesa, [$usu_id]);
$somaDespesas = $querySomaDespesas->data;

// SQL para pegar os pagamentos de cartão de crédito
$sqlPagtoCartao = "SELECT id_cartao, SUM(valor) AS total_pago
                    FROM movimentacoes
                    WHERE plano_contas = '8.2'
                    AND usu_id = ?
                    GROUP BY id_cartao";

$queryPagtoCartao = prepareAll($sqlPagtoCartao, [$usu_id]);
$pagtoCartao = $queryPagtoCartao->data;

$resultado = [];

foreach ($cartoes as $cartao) {
    $idCartao = $cartao->id;
    $limite = (float) $cartao->limite;

    // Obter o valor já consumido do limite
    $valorConsumido = 0;
    foreach ($limiteConsumido as $consumido) {
        if ($consumido->id == $idCartao) {
            $valorConsumido = (float) $consumido->limite_consumido;
            break;
        }
    }

    // Obter a soma das despesas do cartão
    $totalDespesas = 0;
    foreach ($somaDespesas as $despesa) {
        if ($despesa->id_cartao == $idCartao) {
            $totalDespesas = (float) $despesa->total_valor;
            break;
        }
    }

    // Obter o total pago do cartão
    $totalPago = 0;
    foreach ($pagtoCartao as $pagamento) {
        if ($pagamento->id_cartao == $idCartao) {
            $totalPago = (float) $pagamento->total_pago;
            break;
        }
    }

    // Calcular os valores solicitados
    $valorGasto = $valorConsumido + $totalDespesas;
    $saldoAtual = $valorGasto - $totalPago;

    //porcentagem gasto
    $porcentagem = $saldoAtual / $limite * 100;

    // Adicionar os dados ao resultado
    $resultado[] = [
        'id' => $idCartao,
        'cartao' => $cartao->cartao,
        'limite' => $limite,
        'saldo_atual' => $saldoAtual,
        'porcentagem' => $porcentagem
    ];
}


response([
    'status'=>true,
    'data'=>$resultado
]);



