FROM ubuntu:latest

RUN apt update -y && apt install bind9 dnsutils -y

RUN mkdir -p /etc/bind && chown -R bind:bind /etc/bind

COPY named.conf.local /etc/bind/
COPY db.asa.br /etc/bind/
COPY db.sova.br /etc/bind/

EXPOSE 53/tcp
EXPOSE 53/udp

CMD ["/usr/sbin/named", "-g", "-c", "/etc/bind/named.conf", "-u", "bind"]