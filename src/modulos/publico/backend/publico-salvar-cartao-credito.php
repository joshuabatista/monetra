<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$usu_id = $_SESSION['user_id'];

$cartoes = [
    !empty($_POST['cartao1']) ? $_POST['cartao1'] : null,
    !empty($_POST['cartao2']) ? $_POST['cartao2'] : null,
    !empty($_POST['cartao3']) ? $_POST['cartao3'] : null,
    !empty($_POST['cartao4']) ? $_POST['cartao4'] : null,
    !empty($_POST['cartao5']) ? $_POST['cartao5'] : null
];

$switch = $_POST['switchAvancar'];

if($switch === "false") {
    response([
        'status'=>true,
        'message'=>'Usuario sem cartão de credito'
    ]);
    exit;
}

$sqlCheck = "SELECT cartao
            FROM cartao_credito
            WHERE usu_id = $usu_id";

$queryCheck = prepareAll($sqlCheck);

$cartoesExistentes = [];

foreach ($queryCheck->data as $cartaoCadastrado) {
    $cartoesExistentes[] = $cartaoCadastrado->cartao;
}

if (count($cartoesExistentes) >= 5) {
    $todosCartoesJaCadastrados = true;

    foreach ($cartoes as $novoCartao) {
        if ($novoCartao && !in_array($novoCartao, $cartoesExistentes)) {
            $todosCartoesJaCadastrados = false;
            break; 
        }
    }

    if ($todosCartoesJaCadastrados) {
        response([
            'status' => true,
            'message' => 'Todos os cartões já estão cadastrados. Você pode avançar.'
        ]);
        exit;
    } else {
        response([
            'status' => false,
            'message' => 'Limite de 5 cartões já cadastrados. Não é possível adicionar mais.'
        ]);
        exit;
    }
}

foreach ($cartoes as $novoCartao) {

    if ($novoCartao && !in_array($novoCartao, $cartoesExistentes)) {
        $sql = "INSERT INTO cartao_credito SET 
                usu_id = ?,
                cartao = ?";

        $columns = [
            $usu_id,
            $novoCartao
        ];

        prepareAll($sql, $columns); 
    }

}

response ([
    'status'=>true,
    'message'=>'Cartão cadastrado com sucesso!'
]);
