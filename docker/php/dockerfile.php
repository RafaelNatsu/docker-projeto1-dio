FROM php:8.1-apache
LABEL AUTHOR="Rafael Natsu"

WORKDIR /var/www/html/
COPY src/ /var/www/html/

# Adiciona o docker-php-extension-installer
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions

# Adiciona lts do composer
RUN install-php-extensions @composer

# exemplo: Adicionar mysqli
RUN install-php-extensions mysqli