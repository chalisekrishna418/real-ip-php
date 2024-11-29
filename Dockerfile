# Use the official PHP image with Apache
FROM php:8.2-apache

# Set working directory in the container
WORKDIR /var/www/html

# Copy the PHP script to the web server's document root
COPY index.php /var/www/html/

# Set proper permissions for the web server
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Expose port 80 to serve HTTP traffic
EXPOSE 80

# Start the Apache server
CMD ["apache2-foreground"]
