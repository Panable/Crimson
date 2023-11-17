#!/bin/sh

./exec_query.sh
docker exec crimson-php-apache-1 php /var/www/html/CheltonPHPUnit.php
