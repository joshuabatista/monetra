<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";
require "../backend/send-email.php";

$email = $_GET['email'];

if(empty($email)){
    response([
        'status'=>false,
        'message'=>'informe o email'
    ]);
}

$sql = "SELECT email, id FROM users";

$query = prepareAll($sql);

$emailsBanco = $query->data;

$emailsDecrypt = [];

foreach ($emailsBanco as $emailObj) {
    if (isset($emailObj->email)) {
        $decryptedEmail = decryptData($emailObj->email, $key);
        $emailsDecrypt[] = [
            'usu_id' => $emailObj->id,
            'email' => $decryptedEmail
        ];
    }
}

$usu_id = null; 

foreach ($emailsDecrypt as $item) {
    if ($item['email'] === $email) {
        $usu_id = $item['usu_id'];
        break;
    }
}

if ($usu_id === null) {
    response([
        'status' => false,
        'message' => 'Email não encontrado'
    ]);
}

$verificationCode = random_int(100000, 999999);

$currentTimestamp = time();

$expirationTimestamp = $currentTimestamp + (5 * 60); // 5 min

$expirationDateTime = date('Y-m-d H:i:s', $expirationTimestamp);


//salva no banco o codigo de verificação

$sql = "INSERT INTO password_reset_codes SET 
        usu_id = ?,
        code = ?,
        expires_at = ?";

$columns = [
    $usu_id,
    $verificationCode,
    $expirationDateTime
];

$query = prepare($sql, $columns);  

if(!empty($query->exception)){
    response([
        'status'=>false,
        'message'=>'Erro ao redefinir senha. Contate o suporte tecnico.'
    ]);
}

//Envia email

$assunto = "Codigo de verificacao - Monetra";

$mensagem = '
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recuperar senha</title>
    </head>
    <body style="font-family: Arial, sans-serif; margin: 0; padding: 0;">
        <div style="background-color: #4b50d1; padding: 16px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); width: 100%; text-align: center; color: white;">
            Monetra - Transformando dados em decisões
        </div>
        <div style="padding: 20px; color: #333; line-height: 1.6;">
            <p>Ola!</p>
            <p>Abaixo se econtra seu codigo de validação para criar uma nova senha</p>
            <p>Esse código é unico e expira em 5 minutos, não o compartilhe com ninguem</p>
            <p style="padding: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); text-align: center; background-color: #4b50d1; ">'.$verificationCode.'</p>
            <p>Dúvidas e sugestões, entre em contato com a gente via e-mail: 
                <span style="font-style: italic; color: #6b7280;">monetrafin@gmail.com</span>
            </p>
            <small style="font-size: 12px; color: #6b7280; font-style: italic;">(Não responda este e-mail)</small>
        </div>
    </body>
    </html>
';

$email = enviarEmail($email, '', $assunto, $mensagem);

response([
    'status'=>true
]);


















