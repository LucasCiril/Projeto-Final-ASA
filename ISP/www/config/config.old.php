<?php

$config['default_host'] = 'e-mail';
$config['default_port'] = 143;

$config['smtp_server'] = 'e-mail';
$config['smtp_port'] = 25;

// Se você usa login IMAP para enviar
$config['smtp_user'] = '%u';
$config['smtp_pass'] = '%p';

// Se NÃO estiver usando TLS ainda
$config['smtp_auth_type'] = 'LOGIN';
$config['smtp_helo_host'] = 'mail.asa.br';

// Debug (temporário!)
$config['smtp_debug'] = true;
