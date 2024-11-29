<?php
require '../../../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function enviarEmail($para, $nome, $assunto, $mensagem) {
    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor SMTP
        $mail->isSMTP();                                         
        $mail->Host = 'smtp.gmail.com'; // Ex.: smtp.gmail.com
        $mail->SMTPAuth = true;                                  
        $mail->Username = 'monetrafin@gmail.com'; // Seu e-mail
        $mail->Password = 'eabk ngnq mvso gcup'; // Senha do seu e-mail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // TLS ou SSL
        $mail->Port = 587; // Porta do servidor SMTP (587 para TLS, 465 para SSL)

        // Configurações do remetente e destinatário
        $mail->setFrom('monetrafin@gmail.com', 'Monetra'); // Seu e-mail
        $mail->addAddress($para, $nome); // E-mail e nome do destinatário

        // Conteúdo do e-mail
        $mail->isHTML(true); // Define que o e-mail será em HTML
        $mail->Subject = $assunto; // Assunto
        $mail->Body    = $mensagem; // Corpo do e-mail (HTML permitido)
        $mail->AltBody = strip_tags($mensagem); // Texto alternativo sem HTML

        // Envia o e-mail
        $mail->send();
        return "E-mail enviado com sucesso!";
    } catch (Exception $e) {
        return "Erro ao enviar e-mail: {$mail->ErrorInfo}";
    }
}
