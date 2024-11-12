
## PHP8.1 Laravel 11 MySQL 9.1

## Установка
Проект запускается из контейнера

git clone https://github.com/sshdjm/example.git

composer install

docker-compose up -d

php artisan migrate

## для фронт части 

npm install

npm run dev

    Корзина реализована через сессию

    проект имеет 4 страницы :
    Страница с просмотром товаров
    Страница корзины
    Страница оформленных заказов : без возможности удалять заказы
    Страница оформленных заказов : с возможностью удалять заказы, так же защита через Middleware (сделал простую проверку по почте admin@gmail.com)
     

    Http/
        Controllers/
                Admin/
                    AdminController.php  
                Cart/
                    CartController.php  
                Order/
                    OrderController.php
                Product/ 
                    ProductController.php

        Middleware/
            AdminMiddleware.php

        Services/
            CartService.php
            OrderService.php
            ProductService.php

    Models/
        Cart.php
        Order.php
        Product.php
        User.php

    Resources/
        views/
            admin/
                index.blade.php
            cart/
                index.blade.php
            orders/
                index.blade.php
            products/
                index.blade.php
 
