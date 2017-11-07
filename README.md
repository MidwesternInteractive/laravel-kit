

## Local Environment
If you haven't already, make sure you have your local environment setup.

[Local Environment Setup](https://github.com/MidwesternInteractive/local-environment)

  - [Set Up](#set-up)
    - [Laravel Installer](#laravel-installer)
    - [Install Laravel Project](#install-laravel-project)
    - [Require composer dependencies](#require-composer-dependencies)
    - [Create MySQL DB](#create-mysql-db)
    - [Set up laravel .env](#set-up-laravel-env)
    - [Run MWI Install](#run-mwi-install)
  - [Seeding](#seeding)
    - [Dump Autoload File](#dump-autoload-file)
    - [Edit User Model](#edit-user-model)
    - [Seed Database](#seed-database)
  - [Package Specific Setup](#package-specific-setup)
    - [spatie/laravel-permission](#spatie-laravel-permission)
  - [JavaScript Packages](#javascript-packages)

# Package Specific Setup
__*Note*__ `$` represents a terminal command and should not be typed out.

All commands (unless otherwise specified) should be ran from home dir:
```shell
$ cd
```

## Laravel Installer
```shell
$ composer global require laravel/installer
```

## Install Laravel Project
```shell
$ cd ~/projects/
$ laravel new project-name
```
__*Note*__ to change `/projects/` to your project directory if different.

Use the name of the repository as the project name (replacing spaces and special characters), keep in mind that if your using `valet park` instead of `valet link` the project name will become a directory and default your local domain to "project-name.dev".

## Require composer dependencies
```shell
$ cd project-name
$ composer require mwi/laravel-kit
```

## Create MySQL DB
```shell
$ sh vendor/mwi/laravel-kit/database.sh
```

## Set up laravel .env
__*Note*__ if the .env file does not exist yet (just the .env.example exists) then run the following command first. Otherwise skip this step.
```shell
$ php artisan key:generate
```

Modify the following attributes in the .env file with the credentials for the project
```
APP_NAME="Project name"
APP_URL=http://project-name.dev

DB_DATABASE=databasename
DB_USERNAME=root
DB_PASSWORD=
```

Modify the following attributes in the .env file with the credentials for the project
```
ADMIN_EMAIL=client@projectdomain.com
```

## Run MWI Install
This is will set up the basic structure for a MWI Laravel project.
```shell
$ php artisan mwi:install
```

---

# Seeding
Open `database/seeds/DatabaseSeeder.php` and un comment the following line
```php
$this->call(UsersTableSeeder::class);
```

## Dump Autoload File
```shell
$ composer dump-autoload
```

## Edit User Model
Open `App\User.php` and add `HasRoles` to the use statement of the class
```php
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    // ...
}
```

## Seed Database
```shell
$ php artisan db:seed
```

---

# Package Specific Setup
This next sections walk you through setting up various included packages.

## spatie/laravel-permission

This package is set up by default with `mwi:install`

[Spatie Permissions Documentation](https://github.com/spatie/laravel-permission)

---

# JavaScript Packages
These packages are on an as need basis. If a theme was incorporated they may not be necessary.

*For masking inputs*
```shell
$ npm install inputmask
```

*For form validation*
```shell
$ npm install parsleyjs
```

*For select dropdowns/multiselects*
```shell
$ npm install select2
```

*For card based layouts*
```shell
$ npm install masonry-layout
```
