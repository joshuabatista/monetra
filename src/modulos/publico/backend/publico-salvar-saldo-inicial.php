<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$pdo->beginTransaction();

$saldo = $_POST['saldo'];
$data = $_POST['data'];

$usu_id = $_SESSION['user_id'];

$saldoTratado = str_replace([',', ' ', '-'], '.', $saldo);

if(empty($saldo)){

    response([
        $pdo->rollBack(),
        'status'=>false,
        'message'=>'Preencha o saldo inicial'
    ]);
}

$sqlCheck = "SELECT COUNT(*) total FROM saldo_inicial WHERE usu_id = ?";
$queryCheck = prepare($sqlCheck, [$usu_id]);
$total = $queryCheck->data->total;


if($total > 0) {
    $pdo->rollBack();
    response([
        'status'=>false,
        'message'=>'Saldo inicial ja cadastrado!'
    ]);
}

$sql = "INSERT INTO saldo_inicial SET
        usu_id = ?,
        saldo = ?,
        data = ?";

$columns = [
    $usu_id,
    $saldoTratado,
    $data
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


