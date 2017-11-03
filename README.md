## Local Environment
If you haven't already, make sure you have your local environment setup.

[Local Environment Setup](https://github.com/MidwesternInteractive/local-environment)

# Set Up
__*Note*__ `$` represents a terminal command and should not be typed out.

I will be using vim as the editor. You may use your editor of choice.

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

## Update .gitignore
I would reccomend adding the public resources to the .gitignore file.
```shell
$ vim .gitignore
```
add `/public/css` and `/public/js` to the bottom of the file an save.

## Create MySQL DB
```shell
$ sh vendor/mwi/laravel-kit/database.sh
```

## Set up laravel .env
You can do this with the editor or your choice. I will use vim in this example.
```shell
$ vim .env 
```

## JavaScript Packages
These packages are on an as need basis. If a theme was incorporated they may not be necessary.

---

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
