<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$dadosTabela = $_POST['tabela'];
$usu_id = $_SESSION['user_id'];

foreach($dadosTabela as $linha) {
    $data = $linha['data'];
    $categoria = $linha['categoria'];
    $planoContas = explode(' - ', $linha['plano_contas'])[0];
    $beneficiario = $linha['beneficiario'];
    $tipo = $linha['tipo'];
    $debito = $linha['debito'];
    $credito = $linha['credito'];
}

$dataConvertida = DateTime::createFromFormat('d/m/Y', $data)->format('Y-m-d');

$pdo->beginTransaction();

$valor = '';

if(!empty($debito)) {
    $valor = $debito;
} else {
    $valor = $credito;
}

$valorTratado = str_replace(['R$', ' ', '-'], '', $valor);
$valorTratado = number_format((float)$valorTratado, 2, '.', '');

if(empty($data) || empty($planoContas) || empty($beneficiario) || empty($tipo)){
    response([
        'status'=>false,
        'message'=>"Preencha os campos corretamente"
    ]);
}

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
    $valorTratado
    
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
    'status'=>true,
    'message'=>'Lançamento realizado com sucesso!'
]);
