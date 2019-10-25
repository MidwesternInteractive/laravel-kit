## Local Environment
If you haven't already, make sure you have your local environment setup.

---

[Local Environment Setup](https://github.com/MidwesternInteractive/local-environment)

  - [Set Up](#set-up)
    - [MWI Laravel Setup](#mwi-laravel-setup)
    - [Run the Script](#run-the-script)
  - [Package Specific Setup](#package-specific-setup)
    - [mwi/laravel-crud](#mwi-laravel-crud)
    - [mwi/laravel-forms](#mwi-laravel-forms)
    - [spatie/laravel-permission](#spatie-laravel-permission)
  - [JavaScript Packages](#javascript-packages)
    - [Standard Packages](#standard-packages)
  - [Additional References and Guides](#additional-references-and-guides)

# Set Up
We have an NPM package that handles the entire setup process

## MWI Laravel Setup
```sh
cd ~/projects/
mkdir project-name && cd project-name
npm i mwi-laravel-setup
```

## Run the Script
For instructions on the setup script visit [MWI Laravel Setup](https://www.npmjs.com/package/mwi-laravel-setup)
```sh
python setup.py -n -p
```

## Aliases
For ease of use we'll add some composer scripts to our `composer.json` file.
```json
"sniff": "phpcs -p ./app",
"sniff:fix": "phpcbf -p ./app",
"test": "phpunit",
"sniff:test": "composer sniff && phpunit"
```
The first just sniffs, second fixes the sniff errors it can, third runs phpunit tests and four sniffs and tests together.

---

# Package Specific Setup
These are additional packages that will help in the development of the project.

## MWI Laravel CRUD
This package is setup by default

[MWI Laravel CRUD Documentation](https://github.com/MidwesternInteractive/laravel-crud)

## MWI Laravel Forms
Super handy components for form creation
```sh
composer require mwi/laravel-forms
```

[MWI Laravel Forms Documentation](https://github.com/MidwesternInteractive/laravel-forms)

## Spatie Laravel Permission
This package is set up by default

[Spatie Permissions Documentation](https://github.com/spatie/laravel-permission)

---

# JavaScript/CSS Assets
Always be sure to run the following command during a projects set up
```sh
npm install
```

We utilize laravel mix to handle the building of assets. Visit the [MIX Documentation](https://laravel.com/docs/master/mix) for more information.

Structure your assets by `core`, `theme` and `application` as necessary in the `webpack.mix.js` file.
```java
// Theme Styles
mix.styles('resources/assets/css/theme.css', 'public/css/theme.css')

// Application Styles
.sass('resources/assets/sass/app.scss', 'public/css');

// Core Scripts for Every Page
.scripts([
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

.sourceMaps();
```

## Standard Packages
These packages are on an as need basis. If a theme was incorporated they may not be necessary.

*For masking inputs*
```sh
npm install inputmask
```

*For form validation*
```sh
npm install parsleyjs
```

*For select dropdowns/multiselects*
```sh
npm install select2
```

*For card based layouts*
```sh
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