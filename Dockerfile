FROM alpine:3.3
MAINTAINER Matheus Fidelis <msfidelis01@gmail.com>

RUN apk update ;
RUN apk add --no-cache openssh-client \
    php-xcache php-intl php-json php-curl \
    php-cli php-opcache php-phar php-dom  \
    php-openssl curl wget git

RUN rm /var/cache/apk/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

COPY ./app /app
WORKDIR /app

RUN /usr/bin/composer update --ignore-platform-reqs

EXPOSE 80

CMD ["php", "-S", "0.0.0.0:80", "-t", "/app"]