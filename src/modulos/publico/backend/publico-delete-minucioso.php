<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$pdo->beginTransaction();

$usu_id = $_SESSION['user_id'];
$id = $_GET['id'];

if(empty($id)){
    $pdo->rollBack();
    response([
        'status'=>false,
        'message'=>'Erro ao excluir controle minucioso, contate o suporte tecnico[62]'
    ]);
}

if(empty($usu_id)){
    $pdo->rollBack();
    response([
        'status'=>false,
        'message'=>'Erro ao excluir controle minucioso, contate o suporte tecnico[31]'
    ]);
}

$sql = "DELETE FROM minucioso WHERE id = ? AND usu_id  = ?";

$query = prepare($sql, [$id, $usu_id]);

// dd($query);

if(!empty($query->exception)){
    $pdo->rollBack();
    response([
        'status'=>false,
        'message'=>'Erro ao excluir controle minucioso, contate o suporte tecnico'
    ]);
}

$pdo->commit();

response([
    'status'=>true,
    'message'=>'Sucesso!'
]);