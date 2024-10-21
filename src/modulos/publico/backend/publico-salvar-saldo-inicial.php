<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$pdo->beginTransaction();

$saldo = $_POST['saldo'];

$usu_id = $_SESSION['user_id'];

$saldoTratado = str_replace([',', ' ', '-'], '.', $saldo);

if(empty($saldo)){

    response([
        $pdo->rollBack(),
        'status'=>false,
        'message'=>'Preencha o saldo inicial'
    ]);
}

$sql = "INSERT INTO saldo_inicial SET
        usu_id = ?,
        saldo = ?";

$columns = [
    $usu_id,
    $saldoTratado
];

$query = prepare($sql, $columns);

if(!empty($query->exception)){
    $pdo->rollBack();
    response([
        'status' => false,
        'message' => 'Erro ao salvar saldo inicial'
    ]);
}

$pdo->commit();


response([
    'status'=>true,
    'message'=>'Saldo inicial gravado com sucesso!'
]);


