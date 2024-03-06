FROM php:7.2-apache
LABEL AUTHOR="Rafael Natsu"

WORKDIR /var/www/html/
COPY src/ /var/www/html/

RUN a2enmod ssl && a2enmod rewrite
RUN mkdir -p /etc/apache2/ssl

COPY docker/apache/ssl/*.pem /etc/apache2/ssl/
COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

COPY docker/php/php.ini-production $PHP_INI_DIR/php.ini


# Adiciona o docker-php-extension-installer
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions

# Adiciona lts do composer
RUN install-php-extensions @composer

# exemplo: Adicionar mysqli
RUN install-php-extensions mysqli pdo_mysql xdebug
COPY docker/php/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN touch /tmp/xdebug_remote.log
RUN chmod 777 /tmp/xdebug_remote.log

RUN a2enmod rewrite
RUN service apache2 restart