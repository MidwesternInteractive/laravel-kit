# Project Name
*a brief description of the project*

## Project Description
This is a test project description, it should highlight the goals of the project.

## Getting Started 
If you haven't already, please set up your local environment. [HERE](https://github.com/MidwesternInteractive/local-environment)

### Pulling From Bitbucket

#### Step 1: Pulling down the repository
```
$ git clone git@bitbucket.org:midwesterninteractive/project-name.git
```
*this command inside your projects directory pulls down a local version of the repository*

### Step 2: Installing Dependencies
First. CD inside the project repository 

`$ cd ~/your-project-directory/project-name` 

Then, install Composer Dependencies

```
$ composer install && composer dump-autoload
```

Finally, install NPM Dependencies and build out dist

```
$ npm install && npm run dev
```

### Step 3: Setting up your environment
You will need to create a copy of the `.env.example` file, this file stores vital information about the project.

First, make a copy of the `.env.example` file

```
$ mv .env.example .env
```

Then, create your application key

```
$ php artisan key:generate
```

Then, you'll need to create your local database for this project. You can do this by going into your database manager and logging into local host and adding a new database.


Finally, the database will need to be migrated and/or seeded

If you have a database export then you just need to run

```
$ php artisan migrate:fresh
```

If you need test data then you'll need to run


```
$ php artisan migrate:fresh --seed
```

### Useful Development Tricks

`$ npm run watch` - Watches stylesheets and javascript files for changes, and builds their dist files whenever a change happens.

`$ npm run test` - Runs all the tests and makes sure they passs

`$ npm run sniff` - Checks your PHP code for syntax styling issues
