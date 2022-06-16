#!/bin/bash

docker-compose up -d
docker-compose exec sms-gateway composer i
docker-compose exec sms-gateway cp .env.example .env
docker-compose exec sms-gateway php artisan key:generate
docker-compose exec sms-gateway php artisan migrate --seed
npm i
npm run prod