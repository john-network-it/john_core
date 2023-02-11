FROM php:8.0-apache
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN apt-get install -y ssl-cert
RUN a2enmod ssl
RUN a2enmod rewrite
RUN a2enmod headers
RUN a2enmod deflate
COPY src/ /var/www/html
COPY john.conf /etc/apache2/sites-available/000-default.conf
RUN a2ensite 000-default.conf
RUN a2dissite default-ssl.conf
RUN service apache2 restart
