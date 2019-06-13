FROM phpplatform/php-apache-xdebug-composer

WORKDIR /app
# RUN cd ~ && curl -sS https://getcomposer.org/installer -o composer-setup.php
# RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer

COPY app/composer.json ./

RUN composer install

COPY app/ .

EXPOSE 5000

CMD [ "composer", "start"]