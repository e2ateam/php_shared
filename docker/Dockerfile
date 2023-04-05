FROM php:8.2.4-cli

ARG NODE_VERSION=18

WORKDIR /var/www/html

RUN apt-get update && \
    apt-get install libzip-dev -y && \
    docker-php-ext-install zip \
    && apt-get update \
    && curl -sLS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer \
    && curl -sLS https://deb.nodesource.com/setup_$NODE_VERSION.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm \
    && pecl install -o -f xdebug-3.2.1 \    
    && docker-php-ext-enable xdebug \
    && apt-get update \
    && apt-get install -y yarn vim \    
    && apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*    

COPY php.ini /etc/php/8.2/cli/conf.d/php.ini
COPY docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN chmod +x /var/www/html

EXPOSE 8000

ENTRYPOINT [ "php", "-S" ] 
CMD ["0.0.0.0:8000"]
