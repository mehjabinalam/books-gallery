# Project Installation

## Let's start

At first make sure you have **php 7.4** or **higher** and **composer** also be installed. Then open a terminal in the project directory.

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate --seed

Start the local development server

    php artisan serve

You can now access the server at 
    
    http://127.0.0.1:8000

You can also login with default login credentials
    
    Email    : admin@example.com
    Password : 12345678
