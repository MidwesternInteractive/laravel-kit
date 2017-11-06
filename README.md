## Local Environment
If you haven't already, make sure you have your local environment setup.

[Local Environment Setup](https://github.com/MidwesternInteractive/local-environment)

# Set Up
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
Modify the following attributes in the .env file

```
APP_NAME="Project name"
APP_URL=http://project-name.dev

DB_DATABASE=databasename
DB_USERNAME=root
DB_PASSWORD=
```

## Run MWI Install
This is will set up the basic structure for a MWI Laravel project.
```shell
$ php artisan mwi:install
```

---

# Package Specific Setup
This next sections walk you through setting up various included packages.

## spatie/laravel-permission
[Spatie Permissions Documentation](https://github.com/spatie/laravel-permission)

```shell
$ php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="migrations"
$ php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="config"
```

### Modify Permissions Config
Open `config/permission.php` and modify the table names to match your model.

Most common will be user: `user_has_permissions` and `user_has_roles`.

### Migrate
```shell
$ php artisan migrate
```

### Modify the Model to use Permissions on
Open `App\User` or whatever model it permission swill be used on and add `use HasRoles;` to the class:
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
