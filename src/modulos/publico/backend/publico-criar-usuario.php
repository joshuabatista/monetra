<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";
include "../backend/send-email.php";

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

//Envia email

$assunto = "Bem-vindo(a) ao Monetra, $nome";

$mensagem = '
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boas vindas!</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0;">
    <div style="background-color: #4b50d1; padding: 16px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); width: 100%; text-align: center;">
        monetra - transformando Dados em Decisões
    </div>
    <div style="padding: 20px; color: #333; line-height: 1.6;">
        <p>Ola, ' . $nome . '!</p>
        <p>Obrigado por se cadastrar no nosso sistema de gerenciamento financeiro.</p>
        <p>Estamos felizes em ter você conosco!</p>
        <p>Controle seu dinheiro, seu cartão de crédito, faça controles minuciosos e muito mais!</p>
        <p>Tenha seu controle financeiro na palma da sua mão (disponível também em navegadores mobile).</p>
        <p>Dúvidas e sugestões, entre em contato com a gente via e-mail: 
            <span style="font-style: italic; color: #6b7280;">monetrafin@gmail.com</span>
        </p>
        <small style="font-size: 12px; color: #6b7280; font-style: italic;">(Não responda este e-mail)</small>
    </div>
</body>
</html>
';


$resultado = enviarEmail($email, $nome, $assunto, $mensagem);

$pdo->commit();

response([
    'status'=>true,
    'message'=>'Usuário criado com sucesso!'
]);




