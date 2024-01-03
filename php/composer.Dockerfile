FROM composer:latest

WORKDIR /var/www/eshop

ENTRYPOINT ["composer", "--ignore-platform-reqs"]
