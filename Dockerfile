# Capstone

FROM wordpress:latest

COPY . /usr/src/wordpress/wp-content/themes/capstone/

# Environment stuff for wordpress
# ENV WORDPRESS_DB_PASSWORD=wordpress
# ENV WORDPRESS_DB_USER=wordpress
# ENV WORDPRESS_DB_NAME=wordpress

