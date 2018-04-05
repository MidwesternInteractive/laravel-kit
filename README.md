## Local Environment
If you haven't already, make sure you have your local environment setup.

---

[Local Environment Setup](https://github.com/MidwesternInteractive/local-environment)

  - [Set Up](#set-up)
    - [Laravel Installer](#laravel-installer)
    - [Install Laravel Project](#install-laravel-project)
    - [Require composer dependencies](#require-composer-dependencies)
    - [Set up laravel .env](#set-up-laravel-env)
    - [Project Set Up](#project-set-up)
    - [Run MWI Install](#run-mwi-install)
  - [Seeding](#seeding)
    - [Dump Autoload File](#dump-autoload-file)
    - [Edit User Model](#edit-user-model)
    - [Seed Database](#seed-database)
  - [Testing](#testing)
  - [Package Specific Setup](#package-specific-setup)
    - [mwi/laravel-crud](#mwi-laravel-crud)
    - [mwi/laravel-forms](#mwi-laravel-forms)
    - [spatie/laravel-permission](#spatie-laravel-permission)
  - [JavaScript Packages](#javascript-packages)
    - [Standard Packages](#standard-packages)
  - [Additional References and Guides](#additional-references-and-guides)

# Set Up
__*Note*__ `$` represents a terminal command and should not be typed out.

All commands (unless otherwise specified) should be ran from home directory:
```shell
cd
```

## Laravel Installer
```shell
composer global require laravel/installer
```

## Install Laravel Project
```shell
cd ~/projects/
laravel new project-name
```
__*Note*__ to change `/projects/` to your project directory if different.

Use the name of the repository as the project name (replacing spaces and special characters), keep in mind that if your using `valet park` instead of `valet link` the project name will become a directory and default your local domain to "project-name.loc".

## Require composer dependencies
```shell
cd project-name
composer require mwi/laravel-kit
composer require squizlabs/php_codesniffer --dev
```

## Set up laravel .env
__*Note*__ if there is not .env file in the root folder of the project yet (just the .env.example exists) then run the following command. Otherwise skip this step.
```shell
php artisan key:generate
```

## Project Set Up
Run the following command and follow the instructions
```shell
sh vendor/mwi/laravel-kit/setup.sh
```

## Run MWI Install
This is will set up the basic structure for a MWI Laravel project.
```shell
php artisan mwi:install
```

## NPM Install
Before running any additional commands or steps be sure you install node dependencies
```shell
npm install
```

---

# Seeding
Open `database/seeds/DatabaseSeeder.php` and add the following
```php
<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
```

## Dump Autoload File
```shell
composer dump-autoload
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
php artisan db:seed
```

## Composer Scripts for Refreshing/Seeding
Open your `composer.json` file and add the following to the scripts object
```json
"refresh:seed": "php artisan migrate:refresh --seed"
```

---

# Testing
We utilize PHP CodeSniffer and PHPUnit for testing our source code. PHP Unit comes out of box with Laravel and we installed Code Sniffer when we set up the project.

## Test Environment Setup
Open phpunit.xml and replace the inside of the `<php>` tag to the following.
```xml
<env name="DB_DATABASE" value=":memory:"/>
<env name="DB_CONNECTION" value="sqlite"/>
<env name="APP_ENV" value="testing"/>
<env name="CACHE_DRIVER" value="array"/>
<env name="SESSION_DRIVER" value="array"/>
<env name="QUEUE_DRIVER" value="sync"/>
```

## Aliases
For ease of use we'll add some composer scripts to our `composer.json` file.
```json
"sniff": "phpcs -p ./app",
"sniff:fix": "phpcbf -p ./app",
"test": "phpunit",
"sniff:test": "composer sniff && phpunit",
```
The first just sniffs, second fixes the sniff errors it can, third runs phpunit tests and four sniffs and tests together.

---

# Package Specific Setup
This next sections walk you through setting up various included packages.

## MWI Laravel CRUD
```shell
composer require mwi/laravel-crud
```

[MWI Laravel CRUD Documentation](https://github.com/MidwesternInteractive/laravel-crud)

## MWI Laravel Forms
```shell
composer require mwi/laravel-forms
```

[MWI Laravel Forms Documentation](https://github.com/MidwesternInteractive/laravel-forms)

## Spatie Laravel Permission

This package is set up by default with `mwi:install`

[Spatie Permissions Documentation](https://github.com/spatie/laravel-permission)

---

# JavaScript/CSS Assets
Always be sure to run the following command during a projects set up
```shell
npm install
```

We utilize laravel mix to handle the building of assets. Visit the [MIX Documentation](https://laravel.com/docs/master/mix) for more information.

Structure your assets by `core`, `theme` and `application` as necessary in the `webpack.mix.js` file.
```js
// Core Scripts for Every Page
mix.scripts([
  // -- Your Core Scripts/Dependencies
  "resources/assets/lib/jquery/jquery.min.js",
  "resources/assets/js/main.js"
], 'public/js/core.js')

// Scripts for the Theme
.scripts([
  // -- Your Theme Scripts/Dependencies
  "node_modules/select2/dist/select2.js"
  "resources/assets/js/theme.js",
], 'public/js/theme.js')

// Application JavaScript
.js('resources/assets/js/app.js', 'public/js/app.js')

// Theme Styles
.styles('resources/assets/css/theme.css', 'public/css/theme.css')

// Application Styles
.sass('resources/assets/sass/app.scss', 'public/css');
```

## Standard Packages
These packages are on an as need basis. If a theme was incorporated they may not be necessary.

*For masking inputs*
```shell
npm install inputmask
```

*For form validation*
```shell
npm install parsleyjs
```

*For select dropdowns/multiselects*
```shell
npm install select2
```

*For card based layouts*
```shell
npm install masonry-layout
```

---

# Additional References and Guides
__*Note*__ Some of these guides are still a work in progress.

For more information on how to utilize various features of this kit visit the following:

  - [Laravel Style Guide](https://github.com/MidwesternInteractive/guides/tree/master/laravel)
    - [Code Standards](https://github.com/MidwesternInteractive/guides/tree/master/laravel/standards)
    - [Migrations](https://github.com/MidwesternInteractive/guides/tree/master/laravel/migrations)
    - [Seeders](https://github.com/MidwesternInteractive/guides/tree/master/laravel/seeders)
    - [Tests](https://github.com/MidwesternInteractive/guides/tree/master/laravel/tests)
    - [Routes](https://github.com/MidwesternInteractive/guides/tree/master/laravel/routes)
    - [Models](https://github.com/MidwesternInteractive/guides/tree/master/laravel/models)
    - [Traits](https://github.com/MidwesternInteractive/guides/tree/master/laravel/traits)
    - [Controllers](https://github.com/MidwesternInteractive/guides/tree/master/laravel/controllers)
    - [Services](https://github.com/MidwesternInteractive/guides/tree/master/laravel/services)
    - [Requests](https://github.com/MidwesternInteractive/guides/tree/master/laravel/requests)
    - [Facades](https://github.com/MidwesternInteractive/guides/tree/master/laravel/facades)
    - [Views](https://github.com/MidwesternInteractive/guides/tree/master/laravel/views)