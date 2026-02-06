#!/bin/bash
set -e

echo "Criando usuários de e-mail..."

create_user() {
  USER=$1
  PASS=$2

  if ! id "$USER" &>/dev/null; then
    useradd -m -s /bin/bash "$USER"
    echo "$USER:$PASS" | chpasswd
  fi

  mkdir -p /var/mail/$USER/{cur,new,tmp}
  chown -R $USER:$USER /var/mail/$USER
  chmod -R 700 /var/mail/$USER
}

create_user cirilo redes
create_user lucas redes

echo "Iniciando Postfix..."
service postfix start

echo "Iniciando Dovecot..."
service dovecot start

echo "Servidor de e-mail pronto 🚀"
tail -F /var/log/mail.log

exec "$@"