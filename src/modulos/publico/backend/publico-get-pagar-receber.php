<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$usu_id = $_SESSION['user_id'];

$sql = "SELECT pc.descricao, m.*, DATE_FORMAT(m.data, '%d/%m/%Y') data_formatada    
        FROM movimentacoes m 
        JOIN plano_contas_analitico pc ON pc.codigo = m.plano_contas
        WHERE m.usu_id = $usu_id
        AND m.tipo IN ('3', '4')";

$query = prepareAll($sql);

$data = $query->data;

if(!empty($data->exception)) {
    response([ 
        'status'=>false,
        'message'=>'Erro ao buscar Controle Minucioso. Contate o Suporte Tecnico'
    ]);
}

response([
    'status'=>true,
    'data'=>$data
]);