<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$pdo->beginTransaction();

$usu_id = $_SESSION['user_id'];
$senhaAtual = $_POST['senhaAtual'];
$novaSenha1 = $_POST['novaSenha1'];
$novaSenha2 = $_POST['novaSenha2'];

if(empty($senhaAtual) || empty($novaSenha1) || empty($novaSenha2)) {
    $pdo->rollBack();
    response([
        'status'=>false,
        'message'=>'Preencha os campos obrigatórios'
    ]);
}

if($novaSenha1 != $novaSenha2){
    $pdo->rollBack();
    response([
        'status'=>false,
        'message'=>'A nova senha se difere'
    ]);
}

$sqlSenhaAntiga = "SELECT senha FROM users WHERE id = ?";

$querySenhaAntiga = prepare($sqlSenhaAntiga, [$usu_id]);

$senhaAntiga = $querySenhaAntiga->data->senha;

if(!password_verify($senhaAtual, $senhaAntiga)){
    response([
        'status' => false,
        'message' => "Senha atual incorreta"
    ]);
}

$hashedPassword = password_hash($novaSenha1, PASSWORD_DEFAULT);

$sql = "UPDATE users SET senha = ? WHERE id = ?";

$query = prepare($sql, [$hashedPassword, $usu_id]);


if(!empty($query->exception)){
    $pdo->rollBack();
    response([
        'status'=>false,
        'message'=>'Erro ao alterar a senha, contate o Suporte Tecnico [1354]'
    ]);
}

$pdo->commit();

response([
    'status'=>true,
    'message'=>'Senha alterada com sucesso!',
    'redirect'=>'inicio'
]);



