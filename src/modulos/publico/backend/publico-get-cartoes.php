<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$usu_id = $_SESSION['user_id'];

$sql = "SELECT id, cartao
        FROM cartao_credito 
        WHERE usu_id = ?";

$query = prepareAll($sql, [$usu_id]);

$cartao = $query->data;

if(!empty($cartao->exeption)){
    response([
        'status'=>false,
        'message'=>'Erro ao buscar cartões, contate o suporte do sistema'
    ]);
}

response([
    'status'=>true,
    'data'=>$cartao
]);