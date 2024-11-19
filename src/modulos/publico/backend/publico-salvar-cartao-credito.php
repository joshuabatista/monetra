<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$usu_id = $_SESSION['user_id'];

// Recebendo os dados dos cartões
$cartoes = [];
for ($i = 1; $i <= 4; $i++) {
    $cartoes[] = [
        'cartao' => $_POST["cartao{$i}"] ?? null,
        'limite' => $_POST["limit{$i}"] ?? null,
        'limite_consumido' => $_POST["consumed{$i}"] ?? null,
    ];
}

// Verifica se o switch para avançar está desligado
$switch = $_POST['switchAvancar'];
if ($switch === "false") {
    response([
        'status' => true,
        'message' => 'Usuário sem cartão de crédito'
    ]);
    exit;
}

// Verifica os cartões já cadastrados no banco
$sqlCheck = "SELECT cartao FROM cartao_credito WHERE usu_id = ?";
$queryCheck = prepareAll($sqlCheck, [$usu_id]);

$cartoesExistentes = array_map(fn($cartao) => $cartao->cartao, $queryCheck->data);

// Verifica se o limite de 4 cartões já foi atingido
if (count($cartoesExistentes) >= 4) {

    $todosCartoesJaCadastrados = true;

    foreach ($cartoes as $novoCartao) {
        if ($novoCartao['cartao'] && !in_array($novoCartao['cartao'], $cartoesExistentes)) {
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
            'message' => 'Limite de 4 cartões já cadastrados. Não é possível adicionar mais.'
        ]);
        exit;
    }
}

// Salvar os novos cartões
foreach ($cartoes as $cartao) {
    // Verifica se o cartão é válido e não está cadastrado
    if ($cartao['cartao'] && !in_array($cartao['cartao'], $cartoesExistentes)) {
        $sql = "INSERT INTO cartao_credito (usu_id, cartao, limite, limite_consumido) 
                VALUES (?, ?, ?, ?)";
        $columns = [
            $usu_id,
            $cartao['cartao'],
            $cartao['limite'] ?? 0,
            $cartao['limite_consumido'] ?? 0
        ];

        prepareAll($sql, $columns);
    }
}

response([
    'status' => true,
    'message' => 'Cartões cadastrados com sucesso!'
]);
