#!/usr/bin/env bash

cd docker
docker-compose exec apache-php /usr/local/bin/scss.sh
docker-compose exec apache-php /usr/local/bin/permission.sh
