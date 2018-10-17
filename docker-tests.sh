#!/usr/bin/env bash

cd docker
docker-compose exec apache \
    php /var/www/html/vendor/nette/tester/src/tester.php \
    --colors \
    -j 40 \
    -c /var/www/html/tests/php.ini \
    /var/www/html/tests
