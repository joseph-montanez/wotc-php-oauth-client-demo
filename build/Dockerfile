FROM php:7.2-apache
RUN docker-php-ext-install mysqli

#RUN date -s "$(wget -qSO- --max-redirect=0 google.com 2>&1 | grep Date: | cut -d' ' -f5-8)Z"

#RUN apt-get install -y \
#		libfreetype6-dev \
#		libjpeg62-turbo-dev \
#		libpng-dev \
#RUN docker-php-ext-configure gd \
#    --with-freetype-dir=/usr/include/ \
#    --with-jpeg-dir=/usr/include/
#RUN docker-php-ext-install gd

#RUN docker-php-ext-configure zip --with-libzip=/usr/include
#RUN docker-php-ext-install zip

RUN apt-get update
RUN apt-get install -y zlib1g-dev
RUN apt-get install -y libzip-dev
RUN docker-php-ext-configure zip --with-libzip=/usr/include
RUN docker-php-ext-install zip

RUN pecl install xdebug-2.7.0
RUN docker-php-ext-enable xdebug
RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/php.ini