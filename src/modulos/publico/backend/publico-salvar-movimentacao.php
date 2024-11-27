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

$usu_id = $_SESSION['user_id'];

$dataConvertida = DateTime::createFromFormat('d/m/Y', $data)->format('Y-m-d');

$valor = str_replace(',', '.', $valor);

if(empty($data) || empty($planoContas) || empty($beneficiario) || empty($tipo)){
    $pdo->rollBack();
    response([
        'status' => false,
        'message' => "Preencha os campos corretamente [01]"
    ]);
}

// function encryptData($data, $key)
// {
//     $cipher = "AES-256-CBC"; 
//     $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher)); 
//     $encrypted = openssl_encrypt($data, $cipher, $key, 0, $iv); 
//     return base64_encode($encrypted . '::' . $iv); 
// }

// $encryptionKey = 'teste';

// $valorEncrypted = encryptData($valor, $encryptionKey);

$pdo->beginTransaction();


$sql = "INSERT INTO movimentacoes SET
        usu_id = ?,
        data = ?,
        categoria = ?,
        plano_contas = ?,
        beneficiario = ?,
        tipo = ?,
        valor = ?";

$columns = [
    $usu_id,
    $dataConvertida,
    $categoria,
    $planoContas,
    $beneficiario,
    $tipo,
    $valor
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
