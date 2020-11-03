# How to install

rename .env.example to .env\
docker-compose up -d --build\
docker-compose run --rm npm i\
docker-compose run --rm npm run dev

docker-machine ip\
change 127.0.0.1 ip if needed
---
.env\
MAIL_HOST=127.0.0.1

docker-compose exec web sh\
composer install\
php artisan migrate --seed\
php artisan storage:link

# How to use

Main site \
127.0.0.1:5000
---
Dashboard \
127.0.0.1:5000/dashboard\
admin@gmail.com\
notsosecret
---
Mail Server (order verification)\
127.0.0.1:82
