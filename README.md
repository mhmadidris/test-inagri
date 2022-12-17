# Test INAGRI

## Features

- Multi role authentication
- Login and logout
- Simple CRUD

## Account

- Admin:
  Email: admin@gmail.com
  Password: admin123
- User:
  Email: user@gmail.com
  Password: user123

**Note:** You can create the user account in route "/register" but can't create admin account.

## Instructions:

1. Import inagri.sql file to phpmyadmin / run

> php artisan migrate

and

> php artisan db:seed

in project terminal

2.  After success run

> php artisan serve

3.  Go to local browser and enter existing account
4.  ENJOY IT

## Tools / Plugin

- Laravel 9.44.0
- Laratrust
- Sweetalert2
- Laravel Breeze
