<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$usu_id = $_SESSION['user_id'];

$sql = "SELECT m.*, cc.cartao
        FROM movimentacoes m
        JOIN cartao_credito cc ON cc.id = m.id_cartao
        WHERE m.usu_id = ? AND m.cartao_credito = '1'";

$query = prepareAll($sql, [$usu_id]);


$movimentacao = $query->data;

response([
    'status'=>true,
    'data'=>$movimentacao
]);