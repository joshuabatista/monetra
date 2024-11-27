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
        'message'=>'Erro ao deletar movimento, contate o suporte Tecnico[251]'
    ]);
}

$sql = "DELETE FROM movimentacoes WHERE id = ? AND usu_id = ?";

$query = prepare($sql, [$id, $usu_id]);

if(!empty($query->exception)){
    $pdo->rollBack();
    response([
        'status'=>false,
        'message'=>'Erro ao deletar movimento, contate o suporte Tecnico[1254]'
    ]);
}

$pdo->commit();

response([
    'status'=>true,
    'message'=>'Sucesso!'
]);