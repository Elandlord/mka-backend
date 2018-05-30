#TODO: Use a more complete base-image and skip all the install things.

#Download base image ubuntu 16.04
FROM ubuntu:16.04

# Update Software repository
RUN apt-get update

# Install apt utils
RUN apt-get update && apt-get install -y --no-install-recommends apt-utils
RUN apt-get update

# Install nginx, php-fpm and supervisord from ubuntu repository
RUN apt-get install -y nginx

# Install git
RUN apt-get install -y git

# Install software properties common
RUN apt-get install -y software-properties-common language-pack-en

# Install ppa
RUN LC_ALL=en_US.UTF-8 add-apt-repository ppa:ondrej/php
RUN apt-get update

# Install php
RUN apt-get install -y php7.1-fpm php7.1-zip php7.1-mysql php7.1-gd  php7.1-curl php7.1-json php7.1-gd  mcrypt php7.1-mcrypt php7.1-mbstring php7.1-xml php7.1-json php7.1-soap php7.1-bcmath

# Install supervisor
RUN apt-get install -y supervisor

# Define the ENV variable
ENV nginx_vhost /etc/nginx/sites-available/default
ENV php_conf /etc/php/7.1/fpm/php.ini
ENV nginx_conf /etc/nginx/nginx.conf
ENV supervisor_conf /etc/supervisor/supervisord.conf
ENV www_conf /etc/php/7.1/fpm/pool.d/www.conf
ENV docker_dir deploy/docker

# Enable php-fpm on nginx virtualhost configuration
COPY ${docker_dir}/templates/default ${nginx_vhost}
RUN sed -i -e 's/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/g' ${php_conf} && \
    echo "\ndaemon off;" >> ${nginx_conf}

# Copy supervisor configuration
COPY ${docker_dir}/templates/supervisord.conf ${supervisor_conf}

# Copy fpm pool configuration, most notable change is allow ENV files in S_SERVER var for use in k8s yaml files
COPY ${docker_dir}/templates/www.conf ${www_conf}

# Chown docroot and php run dir
RUN mkdir -p /run/php && \
    chown -R www-data:www-data /var/www/html && \
    chown -R www-data:www-data /run/php


# Install curl
RUN apt-get install -y curl

# Clear default nginx docroot contents
RUN rm -rf /var/www/html/*

# Copy source dir to target dir
COPY . /var/www/html/

# Chown the target dir to www-data
RUN chown -R www-data:www-data /var/www/html

#RUN cd /var/www/html && \
#	mv .env.example .env && \
#	php artisan key:generate

# Clear apt cache
RUN rm -rf /var/lib/apt/lists/*

# Volume configuration
# VOLUME ["/etc/nginx/sites-enabled", "/etc/nginx/certs", "/etc/nginx/conf.d", "/var/log/nginx", "/var/www/html"]

# Configure Services and Port
COPY ${docker_dir}/templates/start.sh /start.sh
RUN chmod +x /start.sh
CMD ["./start.sh"]

EXPOSE 80