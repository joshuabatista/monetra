<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$data = $_POST['data'];
$categoria = $_POST['categoria'];
$planoContas = explode(' - ', $_POST['plano_contas'])[0];
$beneficiario = $_POST['beneficiario'];
$tipo = $_POST['tipo'];
$valor = $_POST['valor'];
$cartao = $_POST['cartao'];
$parcelamento = $_POST['parcelamento'];

$usu_id = $_SESSION['user_id'];

$dataConvertida = DateTime::createFromFormat('d/m/Y', $data)->format('Y-m-d');

$pdo->beginTransaction();

$valorTratado = number_format((float)$valor, 2, '.', '');

if(empty($data) || empty($planoContas) || empty($beneficiario) || empty($tipo) || empty($valor) || empty($cartao) || empty($parcelamento)){
    $pdo->rollBack();
    response([
        'status' => false,
        'message' => "Preencha os campos corretamente [01]"
    ]);
}

$sql = "INSERT INTO movimentacoes SET
        usu_id = ?,
        data = ?,
        categoria = ?,
        plano_contas = ?,
        beneficiario = ?,
        tipo = ?,
        valor = ?,
        id_cartao = ?,
        parcelamento = ?,
        cartao_credito = ?";
        

$columns = [
    $usu_id,
    $dataConvertida,
    $categoria,
    $planoContas,
    $beneficiario,
    $tipo,
    $valorTratado,
    $cartao,
    $parcelamento,
    '1'
];

$query = prepare($sql, $columns);

if(!empty($query->exception)){
    $pdo->rollBack();
    response([
        'status' => false,
        'message' => 'Erro ao lançar movimentação [001]'
    ]);
}

$pdo->commit();

response([
    'status' => true,
    'message' => 'Lançamento realizado com sucesso!'
]);
