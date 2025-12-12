FROM ubuntu:22.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y \
    apache2 \
    php php-imap php-mbstring php-xml php-curl php-zip php-gd \
    php-sqlite3 php-intl \
    curl unzip wget \
    && rm -rf /var/lib/apt/lists/*

# Habilitar módulos PHP/APACHE necessários
RUN phpenmod imap && a2enmod rewrite

WORKDIR /var/www/html

# Copiar arquivos da aplicação
COPY . /var/www/html/

# Instalar PHPMailer
RUN mkdir -p /var/www/html/phpmailer \
    && cd /var/www/html/phpmailer \
    && wget https://github.com/PHPMailer/PHPMailer/archive/refs/tags/v6.8.0.zip \
    && unzip v6.8.0.zip && mv PHPMailer-6.8.0/* . \
    && rm -rf PHPMailer-6.8.0 v6.8.0.zip

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
CMD ["apachectl", "-D", "FOREGROUND"]