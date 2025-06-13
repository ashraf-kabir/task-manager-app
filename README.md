# task-manager-app

## Laravel Task Manager Application
 
 1. User can add new task, edit, mark complete/incomplete and delete them
 2. User can see the list of tasks.
 3. Task can be pinned to top of the list.
 4. User can update profile. Fields are: name, phone, address, city, state, zip, country
 5. User can change password separately. Fields are: old password, new password, confirm password
 6. Admin can add admin & regular users.
 7. Admin can set user status active/inactive.
 8. Every admin can have their own user group.

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


### Deployment

```bash

```

```bash
mkdir -p /var/www/todos.vegasliquidationstore.com
mkdir -p /var/www/todos.vegasliquidationstore.com/htdocs
```

```bash
cp -a task-manager-app/. /var/www/todos.vegasliquidationstore.com/htdocs/
```

```bash
sudo chown -R $USER:$USER /var/www/todos.vegasliquidationstore.com
sudo chmod -R 755 /var/www/todos.vegasliquidationstore.com
```

```bash
sudo nano /etc/nginx/sites-available/todos.vegasliquidationstore.com
```

```nginx
server {
    listen 80;
    server_name todos.vegasliquidationstore.com;

    root /var/www/todos.vegasliquidationstore.com/htdocs/public;
    index index.php index.html index.htm;

    access_log /var/log/nginx/todos_access.log;
    error_log /var/log/nginx/todos_error.log;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock; # Adjust PHP version as needed
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

```bash
sudo ln -s /etc/nginx/sites-available/todos.vegasliquidationstore.com /etc/nginx/sites-enabled/
```

```bash
sudo nginx -t
```

```bash
sudo systemctl restart nginx
```

```bash
sudo certbot --nginx -d todos.vegasliquidationstore.com
```

```bash
sudo systemctl restart php7.4-fpm
```
