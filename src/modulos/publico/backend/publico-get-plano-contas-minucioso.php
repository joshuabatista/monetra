<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

$sql = "SELECT *
        FROM plano_contas_analitico pc
        WHERE pc.tipo = 'despesa'
        ORDER BY pc.descricao asc";

$query = prepareAll($sql);

$planoContas = $query->data;

response([
    'status' => true,
    'data' => $planoContas
]);