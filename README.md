# task-manager-app
 laravel task manager application
 
 1. user can add new task, edit, mark complete/incomplete and delete them
 2. user can change password

## setup instructions

`composer install`

`composer update`

`sudo cp .env.example .env`

note: edit .env to set your DB, user, password

`php artisan key:generate`

`php artisan migrate:fresh --seed`

`php artisan serve`
