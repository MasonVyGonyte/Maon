# Используем официальный образ PHP
FROM php:8.0-fpm

# Установка зависимостей для работы с Symfony
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev git unzip && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Копирование файлов проекта
WORKDIR /var/www/symfony
COPY . .

# Установка зависимостей через Composer
RUN composer install --no-dev --optimize-autoloader

# Открытие порта 80
EXPOSE 80

# Запуск Symfony через PHP встроенный сервер
CMD ["php", "-S", "0.0.0.0:80", "-t", "public"]
