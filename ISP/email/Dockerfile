FROM ubuntu:latest

RUN apt update

RUN apt upgrade -y

RUN apt install postfix  dovecot-imapd dovecot-pop3d -y

RUN apt install net-tools telnet -y

COPY main.cf /etc/postfix

COPY dovecot.conf.local /etc/dovecot/dovecot.conf

COPY 10-mail.conf.local /etc/dovecot/conf.d/10-mail.conf

COPY 10-auth.conf.local /etc/dovecot/conf.d/10-auth.conf

COPY 10-master.conf.local /etc/dovecot/conf.d/10-master.conf

RUN useradd -m cirilo
RUN echo "cirilo:redes"|chpasswd
RUN useradd -m lucas
RUN echo "lucas:redes"|chpasswd

CMD ["sh", "-c", "service postfix start ; service dovecot start; tail -F /var/log/mail.log"]