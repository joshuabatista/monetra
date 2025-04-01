<?php
require '../../../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../../../');
$dotenv->load();

function enviarEmail($para, $nome, $assunto, $mensagem) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = $_ENV['SMTP_HOST'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $_ENV['SMTP_USER'];
        $mail->Password   = $_ENV['SMTP_PASS'];
        $mail->SMTPSecure = $_ENV['SMTP_SECURE'];
        $mail->Port       = $_ENV['SMTP_PORT'];

        // Configurações do remetente e destinatário
        $mail->setFrom($_ENV['SMTP_FROM'], $_ENV['SMTP_FROM_NAME']);
        $mail->addAddress($para, $nome);

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = $assunto;
        $mail->Body    = $mensagem;
        $mail->AltBody = strip_tags($mensagem);

        // Envia o e-mail
        $mail->send();
        return "E-mail enviado com sucesso!";
    } catch (Exception $e) {
        return "Erro ao enviar e-mail: {$mail->ErrorInfo}";
    }
}