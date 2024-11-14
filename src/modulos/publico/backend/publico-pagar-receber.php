<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$pdo->beginTransaction();

$usu_id = $_SESSION['user_id'];

$id = $_GET['id'];
$categoria = $_GET['categoria'];

if($categoria === 'Despesa'){
    $categoria = '1';
} elseif ($categoria === 'Receita') {
    $categoria = '2';
}


if(empty($id)) {
    $pdo->rollBack();
    response([
        'status'=>false,
        'message'=>'Erro [353] (Contate o Suporte Tecnico)'
    ]);
}

$sql = "UPDATE movimentacoes SET 
        tipo = ?
        WHERE id = ?
        AND usu_id = ?";

$query = prepare($sql, [$categoria, $id, $usu_id]);

if(!empty($query->exception)){
    $pdo->rollBack();
    response([
        'status'=>false,
        'message'=>"Erro [2693] (Contate o Suporte Tecnico)"
    ]);
}

$pdo->commit();

response([
    'status'=>true
]);

