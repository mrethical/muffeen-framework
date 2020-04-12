
# Muffeen Framework

A simple and lightweight project that demonstrates the MVC framework concept in PHP. Its not intended for production use, instead use sophisticated frameworks like [Laravel](https://laravel.com/) or [Symfony](https://symfony.com/).
### System Requirements
- PHP 5.3+
    - JSON Extension
    - MBString Extension
    - PDO Extension
    - Composer
### Installation Instructions
- Copy files to root directory of choice
- Run `composer install --no-dev`
- Update database connection on config/app.php
- Update server url (base_url) at config/app.php
- Configure web server's document/web root to be the public directory
### Previewing
- Run `php -S localhost:8000` on the `public` directory.
### Other Instructions
- to debug, set environment to development at config/app.php (do not forget to return it back)
