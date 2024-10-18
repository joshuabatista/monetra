<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

$categoria = $_GET['selectCategoria'];

$where = '';

if($categoria === 'receita') {

    $where .= 'AND (pc.codigo = 19.8 OR pc.codigo = 19.7)';
}

$sql = "SELECT *
        FROM plano_contas_analitico pc
        WHERE pc.tipo = ? $where 
        ORDER BY pc.codigo, pc.descricao asc";

$query = prepareAll($sql, [$categoria]);

$planoContas = $query->data;

response([
    'status' => true,
    'data' => $planoContas
]);