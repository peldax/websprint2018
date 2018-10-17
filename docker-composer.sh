#!/usr/bin/env bash

cd docker
docker-compose exec apache /usr/local/bin/composer.sh
docker-compose exec apache /usr/local/bin/permission.sh
