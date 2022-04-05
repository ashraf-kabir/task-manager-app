# task-manager-app

## Laravel Task Manager Application
 
 1. user can add new task, edit, mark complete/incomplete and delete them
 2. user can see the list of tasks
 3. user can change password

## Project information
1. Framework: Laravel ^7.0
2. Database: MySQL

## setup instructions

`composer install`

`composer update`

`sudo cp .env.example .env`

note: edit .env to set your DB, user, password

`php artisan migrate:fresh --seed`

`php artisan key:generate`

`php artisan serve`
