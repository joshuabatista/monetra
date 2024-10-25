<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$usu_id = $_SESSION['user_id'];

$sql = "SELECT saldo, data FROM saldo_inicial WHERE usu_id = ?";
$query = prepareAll($sql, [$usu_id]);

$saldo = $query->data;

if (!empty($saldo)) {
    $saldoFormatado = number_format($saldo[0]->saldo, 2, ',', '.');

    // Formata a data no formato 'd/m/Y'
    $dataFormatada = $saldo[0]->data;

    // Envia saldo e data no mesmo response
    response([
        'status' => true,
        'data' => [
            'saldo' => $saldoFormatado,
            'data' => $dataFormatada
        ]
    ]);
} else {
    // Caso não exista saldo inicial, retorna null
    response([
        'status' => true,
        'data' => null
    ]);
}
