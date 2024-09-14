# task-manager-app

## Laravel Task Manager Application
 
 1. User can add new task, edit, mark complete/incomplete and delete them
 2. User can see the list of tasks
 3. User can change password
 4. Admin can add admin & regular users
 5. Admin can set user status active/inactive
 6. Every admin can have their own user group

## Project information
1. Framework: Laravel ^7.0
2. Database: MySQL

## Setup Instructions

`composer install`

`composer update`

`sudo cp .env.example .env`

note: edit .env to set your DB, user, password

`php artisan migrate:fresh --seed`

`php artisan key:generate`

`php artisan serve`
