FROM ubuntu:latest

# -------------------------
# Atualizações e dependências
# -------------------------
RUN apt update && apt upgrade -y

# Pacotes essenciais
RUN apt install -y \
    postfix \
    dovecot-imapd \
    dovecot-pop3d \
    net-tools \
    telnet \
    nano

# -------------------------
# Configurações Postfix e Dovecot
# -------------------------
COPY main.cf /etc/postfix/main.cf
COPY dovecot.conf.local /etc/dovecot/dovecot.conf
COPY 10-mail.conf.local /etc/dovecot/conf.d/10-mail.conf
COPY 10-auth.conf.local /etc/dovecot/conf.d/10-auth.conf
COPY 10-master.conf.local /etc/dovecot/conf.d/10-master.conf

# -------------------------
# Criação dos usuários do email (usuários do sistema)
# -------------------------
RUN useradd -m -s /bin/bash cirilo \
 && echo "cirilo:redes" | chpasswd

RUN useradd -m -s /bin/bash lucas \
 && echo "lucas:redes" | chpasswd

# -------------------------
# Criação das Maildirs para cada usuário
# -------------------------
RUN mkdir -p /var/mail/cirilo/{cur,new,tmp} \
 && chown -R cirilo:cirilo /var/mail/cirilo \
 && chmod -R 700 /var/mail/cirilo

RUN mkdir -p /var/mail/lucas/{cur,new,tmp} \
 && chown -R lucas:lucas /var/mail/lucas \
 && chmod -R 700 /var/mail/lucas

# -------------------------
# Garantir que o Dovecot tenha permissões de leitura
# -------------------------
RUN chown -R dovecot:dovecot /var/mail

# -------------------------
# Habilitar rsyslog (sem ele postfix não loga)
# -------------------------
RUN systemctl enable rsyslog || true

# -------------------------
# Comando de execução
# -------------------------
CMD service postfix start && \
    service dovecot start && \
    tail -F /var/log/mail.log
