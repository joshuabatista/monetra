<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";
date_default_timezone_set('America/Sao_Paulo');

$n1 = $_GET['n1'];
$n2 = $_GET['n2'];
$n3 = $_GET['n3'];
$n4 = $_GET['n4'];
$n5 = $_GET['n5'];
$n6 = $_GET['n6'];
$agora = date('Y-m-d H:i:s');

$validationCode = implode('', [$n1, $n2, $n3, $n4, $n5, $n6]);


if (!isset($n1, $n2, $n3, $n4, $n5, $n6) || $n1 === '' || $n2 === '' || $n3 === '' || $n4 === '' || $n5 === '' || $n6 === '') {
    response([
        'status' => false,
        'message' => 'Preencha os campos corretamente'
    ]);
}

$sqlGetCode = "SELECT *
                FROM password_reset_codes
                WHERE code = ?";

$queryGetCode = prepare($sqlGetCode, [$validationCode]);

$code = $queryGetCode->data;

if(!empty($code->exception)){
    response([
        'status'=>false,
        'message'=>'Erro ao solictar nova senha, contate o suporte tecnico'
    ]);
}

if(empty($code)){
    response([
        'status'=>false,
        'message'=>'Código inválido!'
    ]);
}

$created_at = $code->created_at;

$expires_at = $code->expires_at;

if($agora <= $created_at || $agora >= $expires_at){
    response([
        'status'=>false,
        'message'=>'O código expirou, reinicie o processo novamente.'
    ]);
}

$usu_id = $code->usu_id;
$expiry = strtotime('+5 minutes'); // Define validade do link
$tokenData = json_encode(['usu_id' => $usu_id, 'expiry' => $expiry]);
$encryptedToken = base64_encode(openssl_encrypt($tokenData, 'AES-128-CTR', $key, 0, '1234567891011121'));

response([
    'status' => true,
    'message' => 'Redirecionando para alteração de senha',
    'redirect_url' => "/nova-senha?token=$encryptedToken",
    'usu_id'=>$usu_id
]);




