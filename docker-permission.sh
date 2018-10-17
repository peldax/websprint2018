#!/usr/bin/env bash

cd docker
docker-compose exec apache /usr/local/bin/permission.sh
