<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

$email = mb_strtolower(trim($_POST['email'])) ?? null;
$password = $_POST['password'] ?? null;

if(empty($email)){
    response([
        'status'=>false,
        'message'=>'Por favor, preencha seu email!'
    ]);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    response([
        'status' => false,
        'message' => 'Preencha os campos corretamente!'
    ], 200);
}

if(empty($password)){
    response([
        'status'=>false,
        'message'=>'Por favor, preencha sua senha!'
    ]);
}

$sql = "SELECT *
        FROM users
        WHERE email = ?";

$query = prepare($sql, [$email]);

$info = $query->data;

// $id = $info->id;

if(empty($query->data)){
    response([
        'status'=>false,
        'message'=>"Usuário e/ou senha invalidos![001]"
    ]);
}

if(($password !== $info->senha)){
    response([
        'status'=>false,
        'message'=>'Usuário e/ou senha invalidos![002]'
    ]);
}

response([
    'status'=>true,
    'data'=>$info,
]);