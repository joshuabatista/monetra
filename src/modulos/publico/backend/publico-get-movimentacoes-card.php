<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$data_inicio = $_GET['data_inicio'];
$data_final = $_GET['data_final'];
$cartao = $_GET['cartao'];
$plano_contas = $_GET['plano_contas'];
$categoria = $_GET['categoria'];
$tipo = $_GET['tipo'];

$where = '';

if(!empty($data_inicio) && !empty($data_final)){
    $where .= "AND m.data BETWEEN '{$data_inicio}' AND '{$data_final}'";
}

if(!empty($cartao)) {
    $where .= "AND m.id_cartao = $cartao";
}

if(!empty($plano_contas)) {
    $where .= "AND m.plano_contas = '{$plano_contas}'";
}

if(!empty($categoria)) {
    $where .= "AND m.categoria = '{$categoria}'";
}

if(!empty($tipo)) {
    $where .= "AND m.tipo = '{$tipo}'";
}

$usu_id = $_SESSION['user_id'];

$sql = "SELECT pc.descricao, m.*, cc.cartao
        FROM movimentacoes m
        JOIN cartao_credito cc ON cc.id = m.id_cartao
        JOIN plano_contas_analitico pc ON pc.codigo = m.plano_contas
        WHERE m.usu_id = ? AND m.cartao_credito = '1' $where";

$query = prepareAll($sql, [$usu_id]);

$movimentacao = $query->data;

response([
    'status'=>true,
    'data'=>$movimentacao
]);