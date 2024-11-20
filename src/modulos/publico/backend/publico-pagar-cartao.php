<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$pdo->beginTransaction();

$usu_id = $_SESSION['user_id'];
$id = $_GET['id'];
$valor = $_GET['saldoPagar'];
$valorTratado = trim(str_replace('R$', '', $valor));
$valorNumerico = (float) str_replace(',', '.', $valorTratado);
$data = date('Y-m-d');


if(empty($id) || empty($valor)) {
    $pdo->rollback();
    response([
        'status'=>false,
        'message'=>'Erro ao Pagar Cartão [596]'
    ]);
}

$sql = "INSERT INTO movimentacoes SET    
        usu_id = ?,
        categoria = ?,
        plano_contas = ?,
        tipo = ?,
        valor = ?,
        data = ?,
        cartao_credito = ?,
        parcelamento = ?,
        id_cartao = ?";

$columns = [
    $usu_id,
    'Despesa',
    '8.2',
    '1',
    $valorNumerico,
    $data,
    '0',
    '0',
    $id
];

$query = prepare($sql, $columns);

if(!empty($query->exception)){
    $pdo->rollBack();
    response([
        'status'=>false,
        'message'=>"Erro ao Pagar Cartão [41961]"
    ]);
}

$pdo->commit();

response([
    'status'=>true,
    'message'=>'Cartão pago com sucesso!'
]);


