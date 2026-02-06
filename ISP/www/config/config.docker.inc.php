<?php
  $config['db_dsnw'] = 'pgsql://roundcube:roundcube@roundcubedb:5432/roundcube';
  $config['db_dsnr'] = '';
  $config['imap_host'] = 'mail.asa.br:143';
  $config['smtp_host'] = 'mail.asa.br:587';
  $config['username_domain'] = '';
  $config['temp_dir'] = '/tmp/roundcube-temp';
  $config['skin'] = 'elastic';
  $config['request_path'] = '/';
  $config['plugins'] = array_filter(array_unique(array_merge($config['plugins'], ['archive', 'zipdownload'])));
  
