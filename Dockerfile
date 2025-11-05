# Use official PHP + Apache image
FROM php:8.2-apache

# Copy application files to the web root
COPY . /var/www/html/

# Set file permissions
RUN chmod -R 777 /var/www/html/registrations.txt

# Expose port 80
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
