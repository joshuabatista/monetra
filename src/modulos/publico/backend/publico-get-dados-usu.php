<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$usu_id = $_SESSION['user_id'];

$sql = "SELECT *    
        FROM users
        WHERE id = ?";

$query = prepareAll($sql, [$usu_id]);

$info = $query->data;

if(!empty($query->exception)) {
    response([
        'status'=>false,
        'message'=>'Erro ao buscar informações, contate o Suporte Tecnico'
    ]);
}

response([
    'status'=>true,
    'data'=>$info
]);