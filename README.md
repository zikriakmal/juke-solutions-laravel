# prerequisites
    - composer 
    - >= php 7.4
    - >= node js 12.14.0
    - mysql db
# Installation
    - clone this project
    - cd into this project
    - create database on mysql with "juke-solutions" name
    - copy .env.example into .env file
    - run "composer install" on terminal
    - run "php artisan key:generate"
    - run "php artisan migrate"
    - run "php artisan storage:link"
    - run "npm i" 
    - run "npx mix" twice

# serving 
    - serving with php artisan serve 
# or deploying
    - deploy with your own webserver with enabling vhost on your domain

# License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
