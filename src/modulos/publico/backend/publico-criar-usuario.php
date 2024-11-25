<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$pdo->beginTransaction();

$email = $_POST['email-criar'];
$password1 = $_POST['password-criar'];
$password2 = $_POST['password-criar-confirmar'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];

if(empty($email) || empty($password1) || empty($password2) || empty($nome) || empty($sobrenome)){
    $pdo->rollback();
    response([
        'status'=>false,
        'message'=>"Preencha os campos corretamente"
    ]);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    response([
        'status' => false,
        'message' => 'Verifique o email preenchido!'
    ], 200);
}

if($password1 != $password2) {
    $pdo->rollBack();
    response([
        'status'=>false,
        'message'=>'As senhas não se coincidem'
    ]);
}

$sqlEmails = "SELECT email
            FROM users";

$queryEmails = prepareAll($sqlEmails);

$emailBanco = $queryEmails->data;

$emailExiste = false;


foreach ($emailBanco as $emails) {
    if (strcasecmp(trim($emails->email), trim($email)) === 0) {
        $emailExiste = true;

        $pdo->rollBack();
        response([
            'status' => false,
            'message' => 'Já existe uma conta cadastrada neste Email.'
        ]);
        break;
    }
}

$sql = "INSERT INTO users set
        email = ?,
        senha = ?,
        nome = ?,
        sobrenome = ?";

$columns = [
    $email,
    $password1,
    $nome,
    $sobrenome
];

$query = prepare($sql, $columns);

if(!empty($query->exception)){
    response([
        'status'=>false,
        'message'=>'Erro ao cadastrar Usuário, tente novamente mais tarde.'
    ]);
}

$usu_id = $pdo->lastInsertId();

$sqlInfo = "SELECT id, nome, sobrenome, email FROM users WHERE id = ?";

$userData = prepare($sqlInfo, [$usu_id]);

if (!empty($userData->exception)) {
    $pdo->rollBack();
    response([
        'status' => false,
        'message' => 'Erro ao recuperar os dados do usuário.'
    ]);
}

$info = $userData->data;
$_SESSION['user_id'] = $info->id;
$_SESSION['user_name'] = $info->nome;
$_SESSION['user_lastName'] = $info->sobrenome;
$_SESSION['user_email'] = $info->email;



$pdo->commit();

response([
    'status'=>true,
    'message'=>'Usuário criado com sucesso!'
]);




