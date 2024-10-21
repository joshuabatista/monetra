<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$usu_id = $_SESSION['user_id'];

$sql = "SELECT saldo
        FROM saldo_inicial
        WHERE usu_id = $usu_id";

$query = prepareAll($sql);

$saldo = $query->data;

if (!empty($saldo)) {
    $saldoFormatado = number_format($saldo[0]->saldo, 2, ',', '.');
    response([
        'status' => true,
        'data' => $saldoFormatado 
    ]);
} else {
    response([
        'status' => true,
        'data' => null 
    ]);
}