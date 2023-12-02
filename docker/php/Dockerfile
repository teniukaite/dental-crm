FROM php:8.2-fpm
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    libpng-dev \
    libicu-dev \
    && docker-php-ext-install zip pdo_mysql gd intl

COPY php.ini /usr/local/etc/php/conf.d/php.ini

# install node
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash -
RUN apt-get install -y nodejs

# install wkhtmltopdf
RUN apt-get install -y libxrender1 libfontconfig1 libxext6 libssl-dev
RUN apt-get install -y wkhtmltopdf

# install fonts
RUN apt-get install -y fonts-ipafont fonts-ipafont-gothic fonts-ipafont-mincho

# install lithuanian locale
RUN apt-get install -y locales
RUN echo "lt_LT.UTF-8 UTF-8" > /etc/locale.gen && locale-gen
ENV LC_ALL lt_LT.UTF-8
ENV LANG lt_LT.UTF-8
ENV LANGUAGE lt_LT.UTF-8

# install Arial font
RUN apt-get install wget cabextract xfonts-utils
RUN apt-get update; apt-get install -y fontconfig
RUN mkdir -p /usr/share/fonts/truetype/msttcorefonts
COPY fonts/ttf-mscorefonts-installer_3.7_all.deb /usr/share/fonts/truetype/msttcorefonts
RUN cd /usr/share/fonts/truetype/msttcorefonts && dpkg -i ttf-mscorefonts-installer_3.7_all.deb
RUN fc-cache -f -v

# install bcmatch
RUN docker-php-ext-install bcmath

RUN apt-get install -y git


CMD ["php-fpm"]
