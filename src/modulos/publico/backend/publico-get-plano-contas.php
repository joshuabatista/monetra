<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

$categoria = $_GET['selectCategoria'];

$sql = "SELECT *
        FROM plano_contas_analitico pc
        WHERE pc.tipo = ?
        ORDER BY pc.codigo, pc.descricao asc";

$query = prepareAll($sql, [$categoria]);

$planoContas = $query->data;

response([
    'status' => true,
    'data' => $planoContas
]);