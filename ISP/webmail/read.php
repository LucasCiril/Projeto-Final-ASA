<?php
require 'imap.php';

$email_number = $_GET['num'];
$username = $_GET['user'];
$password = $_GET['pass'];

$hostname = '{mail.asa.br:993/imap/ssl}INBOX';

$inbox = imap_open($hostname, $username, $password);

$overview = imap_fetch_overview($inbox, $email_number, 0)[0];
$message = imap_fetchbody($inbox, $email_number, 1);

echo "<h2>Assunto: {$overview->subject}</h2>";
echo "<b>De:</b> {$overview->from}<br><br>";
echo "<pre>" . htmlspecialchars($message) . "</pre>";

echo "<br><br><a href='webmail.php'>Voltar</a>";

imap_close($inbox);
?>
