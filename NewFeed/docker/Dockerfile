# Dockerfile
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Copy existing application directory contents to the container
COPY . /var/www/html

# Set permissions for Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage

# Enable Apache modules and configure the virtual host
RUN a2enmod rewrite
COPY apache-site.conf /etc/apache2/sites-available/000-default.conf

# Expose port 80 for Apache
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
