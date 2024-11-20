<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

$categoria = $_GET['selectCategoria'];

$sql = "SELECT *
        FROM plano_contas_analitico pc
        WHERE pc.tipo = ?
        AND pc.status = '1'
        AND pc.codigo NOT IN ('19.1', '19.2', '19.3', '19.4', '19.5', '19.6')
        ORDER BY pc.codigo, pc.descricao asc";

$query = prepareAll($sql, [$categoria]);

$planoContas = $query->data;

response([
    'status' => true,
    'data' => $planoContas
]);