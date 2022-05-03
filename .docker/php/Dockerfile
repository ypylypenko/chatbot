FROM php:8.1-fpm

ENV DEBIAN_FRONTEND=noninteractive

ENV TZ=Europe/Kiev

ENV PATH=/app:/app/vendor/bin:/root/.composer/vendor/bin:$PATH \
    COMPOSER_ALLOW_SUPERUSER=1

RUN apt-get update --fix-missing
RUN apt-get install -y build-essential libonig-dev libpq-dev libpng-dev libjpeg-dev libfreetype6-dev

RUN apt-get install -y --no-install-recommends libzip-dev \
    git \
    supervisor \
    gnupg \
    curl \
    wget \
    libjpeg-dev \
    libpng-dev \
    libwebp-dev \
    libfreetype6-dev \
    apt-utils \
    libxml2-dev \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev \
    libbson-1.0 \
    libcurl3-dev \
    openssh-client \
    procps \
    net-tools

RUN docker-php-ext-configure bcmath \
    && docker-php-ext-configure gd --with-freetype --with-webp --with-jpeg \
    && docker-php-ext-install zip \
      sockets \
      gd \
      soap \
      curl \
      intl \
      bcmath \
      exif \
      iconv \
      mbstring \
      opcache \
      pdo_mysql \
    && docker-php-ext-enable gd \
    && apt-get -y autoclean

COPY --from=composer:2.2.6 /usr/bin/composer /usr/local/bin/composer

WORKDIR /app
