<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

echo "<pre>";
    print_r($_SESSION);
echo "</pre>";
die;

$dadosTabela = $_POST['tabela'];

foreach($dadosTabela as $linha) {
    $data = $linha['data'];
    $categoria = $linha['categoria'];
    $planoContas = $linha['plano_contas'];
    $beneficiario = $linha['beneficiario'];
    $tipo = $linha['tipo'];
    $debito = $linha['debito'];
    $credito = $linha['credito'];
}

if(empty($data) || empty($planoContas) || empty($beneficiario) || empty($tipo)){
    response([
        'status'=>false,
        'message'=>"Preencha os campos corretamente"
    ]);
}

$sql = "INSERT INTO movimentacoes SET
        usu_id = ";