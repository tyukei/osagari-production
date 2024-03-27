# osagari-production

## Setup
1. install docker
1. fix .env file
1. run docker-compose 
```
cd osagari-production/laradock
docker-compose up -d php-fpm nginx mysql workspace
docker-compose exec workspace bash
```