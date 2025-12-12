<?php
require 'imap.php';

$username = $_POST['username'];
$password = $_POST['password'];

$hostname = '{mail.asa.br:993/imap/ssl}INBOX';

$inbox = imap_open($hostname, $username, $password);

if(!$inbox) {
    die("Erro ao conectar: " . imap_last_error());
}

$emails = imap_search($inbox, 'ALL');

echo "<h2>Webmail - Caixa de Entrada</h2>";
echo "<a href='send.php?user=$username&pass=$password'>Enviar e-mail</a><br><br>";

if($emails) {
    rsort($emails);
    foreach($emails as $email_number):
        $overview = imap_fetch_overview($inbox, $email_number, 0);
        echo "<a href='read.php?num=$email_number&user=$username&pass=$password'>" .
             $overview[0]->subject . "</a><br>";
    endforeach;
} else {
    echo "Nenhum e-mail encontrado.";
}

imap_close($inbox);
?>
