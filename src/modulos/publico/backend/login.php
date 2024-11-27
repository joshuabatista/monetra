<?php

session_start();

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
        FROM users";

$query = prepareAll($sql, []);

$info = $query->data;

$usuario = New stdClass;

foreach ($info as $k => $value) {

    $decryptEmail = decryptData($value->email, $key);

    $userEncontrado = $decryptEmail == $email ? true : false;

    if(!$userEncontrado)
        continue;

    $usuario->id = $value->id;
    $usuario->email = decryptData($value->email, $key);
    $usuario->nome = decryptData($value->nome, $key);
    $usuario->sobrenome = decryptData($value->sobrenome, $key);
    $usuario->senha = $value->senha;
}

if(!$userEncontrado){
    response([
        'status' => false,
        'message' => "Usuário não encontrado"
    ]);
}

$password = base64_decode($password);


if(!password_verify($password, $usuario->senha)){
    response([
        'status'=>false,
        'message'=>'Usuário e/ou senha invalidos![002]'
    ]);
}

$_SESSION['user_id'] = $usuario->id;
$_SESSION['user_name'] = $usuario->nome;
$_SESSION['user_lastName'] = $usuario->sobrenome;
$_SESSION['user_email'] = $usuario->email;


response([
    'status'=>true,
    'data'=>$info,
]);