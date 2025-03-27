<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$usu_id = $_SESSION['user_id'];

$sql = "SELECT email, senha, nome, sobrenome  
        FROM users
        WHERE id = ?";

$query = prepareAll($sql, [$usu_id]);

if(!empty($query->exception)) {
    response([
        'status'=>false,
        'message'=>'Erro ao buscar informações, contate o Suporte Tecnico'
    ]);
}

$info = $query->data;

$info = $info[0];

$decrypt = [
    'email' => decryptData($info->email, $key),
    'nome' => decryptData($info->nome, $key),
    'sobrenome' => decryptData($info->sobrenome, $key),
];

response([
    'status'=>true,
    'data'=>$decrypt
]);