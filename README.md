# ProximaTech
This is a web development web application.

## Getting started

Have composer installed

```bash
https://getcomposer.org/download/
```
Clone the project ProximaTech from github

```bash
https://github.com/Athanax/proximatech.git
```
Run composer install and npm

```bash
composer install
```

Edit the env file and set your database credentials

```bash
DB_DATABASE = your_database_name
DB_USERNAME = your_database_username
DB_PASSWORD = your_database_password
```
Run laravel development server and laravel websocket server

```bash
php artisan serve
```

Run the migrations
```bash
php artisan migrate
```
Start Apache and MySQL in the localsever

Type the localhost URL as provided by the Laravel Development Server
```bash
http://127.0.0.1:8000
```
Create atleast two accounts to test the functionalities
