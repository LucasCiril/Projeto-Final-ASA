FROM ubuntu:latest

RUN apt update && apt upgrade -y && \
    apt install -y \
      postfix \
      dovecot-imapd \
      dovecot-pop3d \
      net-tools \
      telnet \
      nano && \
    apt clean

# Configurações
COPY main.cf /etc/postfix/main.cf
COPY dovecot.conf.local /etc/dovecot/dovecot.conf
COPY 10-mail.conf.local /etc/dovecot/conf.d/10-mail.conf
COPY 10-auth.conf.local /etc/dovecot/conf.d/10-auth.conf
COPY 10-master.conf.local /etc/dovecot/conf.d/10-master.conf
COPY master.cf /etc/postfix/master.cf

# Entrypoint
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]
