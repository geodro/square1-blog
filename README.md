# Square1 Blog

## Requirements

PHP 7.3 or 8.0, Composer, Docker or LAMP/LEMP stack

## Square1 Blog Installation

- `composer install`
- create `.env` file from `.env.example` (copy and rename it)
- `php artisan key:generate`

### Docker version  

- `./vendor/bin/sail up`
- `./vendor/bin/sail artisan migrate`
- `./vendor/bin/sail artisan schedule:work`

### No docker?

- You need to install LAMP/LEMP stack
- edit `.env` to have the connections to mysql
- `php artisan migrate`
- `php artisan serve` to run the server if you don't have nginx or apache
- `php artisan schedule:work` to run the scheduler, alternatively see https://laravel.com/docs/8.x/scheduling#running-the-scheduler 

## Square1 Blog Command lines
- `./vendor/bin/sail artisan square1:import` this can be executed manually to import external blog posts, but is also executed every hour.
- optionally you can call `./vendor/bin/sail artisan square1:init` to create the admin user. otherwise, it will be created when the import command will be executed for the first time
