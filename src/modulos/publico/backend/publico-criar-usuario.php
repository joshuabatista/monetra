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

if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password1)) {
    $pdo->rollBack();
    response([
        'status' => false,
        'message' => 'A senha deve ter no mínimo 8 caracteres, incluindo uma letra maiúscula, uma minúscula, um número e um caractere especial.'
    ]);
}


$hashedPassword = password_hash($password1, PASSWORD_DEFAULT);
$encryptedEmail = encryptData($email, $key);
$encryptedNome = encryptData($nome, $key);
$encryptedSobrenome = encryptData($sobrenome, $key);
$emailHash = hash_hmac('sha256', $email, $key);

$sqlEmails = "SELECT email
            FROM users";

$queryEmails = prepareAll($sqlEmails);

$emailBanco = $queryEmails->data;

$emailExiste = false;




$emailCriptografado = encryptData($email, $key); // Criptografa o e-mail recebido

$emailExiste = false;


foreach ($emailBanco as $emails) {

    $emailDescriptografado = decryptData($emails->email, $key);


    if ($emailDescriptografado === false) {
        continue; 
    }

    if (strcasecmp(trim($emailDescriptografado), trim($email)) === 0) {
        $emailExiste = true;

        $pdo->rollBack();
        response([
            'status' => false,
            'message' => 'Já existe uma conta cadastrada neste Email.'
        ]);
        break; // Encerra o loop
    }
}


$sql = "INSERT INTO users set
        email = ?,
        senha = ?,
        nome = ?,
        sobrenome = ?";

$columns = [
    $encryptedEmail,
    $hashedPassword,
    $encryptedNome,
    $encryptedSobrenome
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




