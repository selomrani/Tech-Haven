FROM php:8.2-apache 
# (Or whatever version you are using, e.g., php:8.1-fpm)

# --- ADD THIS COMMAND ---
RUN docker-php-ext-install pdo pdo_mysql
# ------------------------

# The rest of your Dockerfile...
COPY . /var/www/html/