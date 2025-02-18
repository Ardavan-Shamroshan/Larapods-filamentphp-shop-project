# Larapods FilamentPHP Shop Project

## Installation

First clone this repository, install the dependencies, and setup your .env file.

```
git clone git@github.com:Ardavan-Shamroshan/Larapods-filamentphp-shop-project.git shop
composer install
cp .env.example .env
```

Then create the necessary database.

```
php artisan db
create database shop
```

And run the initial migrations and seeders.

```
php artisan migrate --seed
```

## Further Ideas

Be Patient.