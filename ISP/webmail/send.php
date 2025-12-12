<?php
use PHPMailer\PHPMailer\PHPMailer;

require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

$user = $_GET['user'];
$pass = $_GET['pass'];

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'mail.asa.br';
    $mail->SMTPAuth = true;
    $mail->Username = $user;
    $mail->Password = $pass;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom($user);
    $mail->addAddress($_POST['to']);
    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['body'];

    if($mail->send()) {
        echo "E-mail enviado!";
    } else {
        echo "Erro: " . $mail->ErrorInfo;
    }
    exit;
}
?>

<h2>Enviar E-mail</h2>

<form method="POST">
    Para:<br>
    <input type="text" name="to"><br><br>
    Assunto:<br>
    <input type="text" name="subject"><br><br>
    Mensagem:<br>
    <textarea name="body"></textarea><br><br>
    <input type="submit" value="Enviar">
</form>

<br><a href='webmail.php'>Voltar</a>
