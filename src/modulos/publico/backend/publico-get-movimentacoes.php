<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$usu_id = $_SESSION['user_id'];

$sql = "SELECT pc.descricao, m.*
        FROM movimentacoes m
        JOIN plano_contas_analitico pc ON pc.codigo = m.plano_contas
        WHERE usu_id = ?";

$query = prepareAll($sql, [$usu_id]);


$movimentacao = $query->data;

response([
    'status'=>true,
    'data'=>$movimentacao
]);