sudo docker-compose up    
composer install  
php artisan migrate:refresh --seed   
cd /resources/js && npm run prod   