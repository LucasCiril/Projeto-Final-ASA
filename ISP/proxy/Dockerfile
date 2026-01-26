FROM nginx:latest

RUN mkdir -p /usr/share/nginx/proxy

COPY default.conf /etc/nginx/conf.d

COPY index.html /usr/share/nginx/proxy/index.html

COPY certs /etc/nginx/certs