<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$usu_id = $_SESSION['user_id'];

$planoContas = $_POST['planoContas'];
$limite = $_POST['limite'];
$limite = str_replace(['.', ','], ['', '.'], $limite);

$pdo->beginTransaction();

if(empty($planoContas) || empty($limite)){
    $pdo->rollBack();
    response([
        'status'=>false,
        'message'=>'Preencha os campos corretamente'
    ]);
}

$sql = "INSERT INTO minucioso SET
        usu_id = ?,
        plano_contas = ?,
        limite = ?";

$columns = [
    $usu_id,
    $planoContas,
    $limite
];

$query = prepare($sql, $columns);

if(!empty($query->exception)){
    $pdo->rollBack();
    response([
        'status' => false,
        'message' => 'Erro ao lançar Controle Minucioso [001]'
    ]);
}

$pdo->commit();

response([
    'status' => true,
    'message' => 'Controle salvo!'
]);
