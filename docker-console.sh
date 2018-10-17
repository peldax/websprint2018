#!/usr/bin/env bash

cd docker
docker-compose exec apache php /var/www/html/bin/console $1
