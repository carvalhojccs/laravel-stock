# Estágio 1: Build de Assets com Node.js
FROM node:lts AS assets
WORKDIR /app

# Copiar arquivos necessários para dependências Node.js
COPY package*.json ./
RUN npm ci

# Copiar o restante da aplicação e compilar os assets
COPY . ./
RUN npm run build

# Estágio 2: Ambiente PHP para Produção
FROM php:8.3-fpm-alpine
WORKDIR /var/www

# Configuração de variáveis de ambiente para otimização
ENV PHP_OPCACHE_ENABLE=1 \
    PHP_OPCACHE_ENABLE_CLI=1 \
    PHP_OPCACHE_MEMORY_CONSUMPTION=128 \
    PHP_OPCACHE_MAX_ACCELERATED_FILES=10000 \
    PHP_OPCACHE_VALIDATE_TIMESTAMPS=0

# Instalar dependências do sistema e extensões PHP
RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
    && apk add --no-cache \
        libpq-dev \
        libzip-dev \
        freetype-dev \
        libjpeg-turbo-dev \
        libpng-dev \
        zip \
        unzip \
        bash \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        gd \
        pdo_pgsql \
        pgsql \
        zip \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && apk del .build-deps

# Copiar a aplicação inteira para o container
COPY . .

# Copiar o Composer para o container
COPY --from=composer:lts /usr/bin/composer /usr/bin/composer

# Instalar dependências PHP
RUN composer install --no-dev --optimize-autoloader --no-scripts --no-interaction

# Copiar assets gerados na etapa anterior
COPY --from=assets /app/public/build /var/www/public/build

# Ajustar permissões para o Laravel
RUN chown -R www-data:www-data storage bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache

# Copiar e configurar o entrypoint
COPY app_entrypoint.sh /usr/local/bin/app_entrypoint.sh
     
RUN chmod +x /usr/local/bin/app_entrypoint.sh

# Expor a porta PHP-FPM
EXPOSE 9000

# Definir o entrypoint
ENTRYPOINT ["app_entrypoint.sh"]
