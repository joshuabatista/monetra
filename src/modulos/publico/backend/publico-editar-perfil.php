<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$pdo->beginTransaction();

$usu_id = $_SESSION['user_id'];

$email = $_POST['emailUsu'];
$nome = $_POST['nomeUsu'];
$sobrenome = $_POST['sobrenomeUsu'];
$celular = $_POST['celularUsu'];

if(empty($email) || empty($nome) || empty($sobrenome)) {
    $pdo->rollback();
    response([
        'status'=>false,
        'message'=>'Preencha os campos corretamente'
    ]);
}

$sql = "UPDATE users SET email = ?, nome = ?, sobrenome = ?, celular = ? WHERE id = ?";

$query = prepare($sql, [$email, $nome, $sobrenome, $celular, $usu_id]);

if(!empty($query->exception)) {
    $pdo->rollback();
    response([
        'status'=>false,
        'message'=>'Erro ao alterar dados, contate o suporte Tecnico [254]'
    ]);
}

$pdo->commit();

response([
    'status'=>true,
    'message'=>'Dados alterados com sucesso!'
]);