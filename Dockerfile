FROM php:7.4-apache
RUN usermod -u 1000 www-data; chsh -s /bin/bash www-data 
RUN curl https://raw.githubusercontent.com/helm/helm/main/scripts/get-helm-3 | bash
RUN apt-get update; apt-get install -y  libpq-dev
RUN docker-php-ext-install pdo pgsql pdo_pgsql
RUN a2enmod rewrite
EXPOSE 80