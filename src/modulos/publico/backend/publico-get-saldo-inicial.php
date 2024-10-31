<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$usu_id = $_SESSION['user_id'];

$sql = "SELECT valor, data FROM movimentacoes WHERE usu_id = ? AND categoria = 'Inicial'";
$query = prepareAll($sql, [$usu_id]);

$saldo = $query->data;

if (!empty($saldo)) {

    $saldoFormatado = number_format($saldo[0]->valor, 2, ',', '.');

    $dataFormatada = $saldo[0]->data;

    response([
        'status' => true,
        'data' => [
            'saldo' => $saldoFormatado,
            'data' => $dataFormatada
        ]
    ]);
} else {
    response([
        'status' => true,
        'data' => null
    ]);
}
