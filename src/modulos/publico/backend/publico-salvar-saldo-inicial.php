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

$sqlCheck = "SELECT COUNT(*) total FROM movimentacoes WHERE usu_id = ? AND categoria = 'Inicial'";
$queryCheck = prepare($sqlCheck, [$usu_id]);
$total = $queryCheck->data->total;


if($total > 0) {
    $pdo->rollBack();
    response([
        'status'=>false,
        'message'=>'Saldo inicial ja cadastrado!'
    ]);
}

$sql = "INSERT INTO movimentacoes SET
        usu_id = ?,
        categoria = ?,
        valor = ?,
        data = ?";

$columns = [
    $usu_id,
    'Inicial',
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


