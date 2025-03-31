<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";
include "../backend/send-email.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];

$pdo->beginTransaction();

$mensagem_formatada = nl2br(htmlspecialchars($mensagem));

$erro = '';
$erro .= empty($nome) ? '<br />Informe seu <strong>Nome</strong>' : '';
$erro .= empty($email) ? '<br />Informe seu <strong>E-mail</strong>' : '';
$erro .= empty($assunto) ? '<br />Informe o <strong>assunto</strong>' : '';
$erro .= empty($mensagem) ? '<br />Escreva sua <strong>menssagem</strong>' : '';

if(!empty($erro)){
    $pdo->rollBack();
    response([
        'status' => false,
        'message' => 'Preencha os campos corretamente <br>' . $erro
    ]);
}

$message = '
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suporte - '.$assunto.' </title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0;">
    <div style="background-color: #4b50d1; padding: 16px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); width: 100%; text-align: center;">
        monetra - transformando Dados em Decisões
    </div>
    <div style="padding: 20px; color: #333; line-height: 1.6;">
        <p><b>Solicitação de Suporte -  ' . $nome . '</b></p>
       <p>'.$mensagem_formatada.'</p>
        <small style="font-size: 12px; color: #6b7280; font-style: italic;">(Enviado por '.$email.')</small>
    </div>
</body>
</html>
';

$e_mail = "monetrafin@gmail.com";

$sendSuporte = enviarEmail($e_mail, '', $assunto, $message);

$resposta = '<small>Solicitação enviada com successo, '.$nome .'! <br><br> Em breve te retornaremos, muito obrigado por nos contatar! <br><br> <small style="font-size: 12px; color: #6b7280; font-style: italic;">Suporte monetra</small> </small>';

if($sendSuporte){
    response([
        'status'=>true,
        'message'=>$resposta
    ]);
}