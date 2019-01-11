# WP Base

This is an opinionated boilerplate for web development with WordPress. It is build upon [Bedrock](https://github.com/roots/bedrock).

## Setup
In order to use this starter theme for your next project you need to make the following configurations:

1. `git clone git@github.com:jchristlieb/wp-base.git 'projectname'`
2. `npm install` -> loads the `package.json` dependencies
3. `composer update` -> loads the `composer.json` dependencies
    * to install the ACF pro plugin you need to deposit your key within your `.env` file 
    * if you do not have your own key, visit [ACF website](https://www.advancedcustomfields.com/) to get your pro version or use the free version instead and update the `composer.json` dependency accordingly. 
2. `cp .env.example .env` // set up your database connection and localhost in .env
3. `/build/config.yml` // adjust proxy to your localhost address

## Dependency management 
We use tools to manage (install, update, delete) the PHP and JavaScript dependencies of the project.

#### [Composer](https://getcomposer.org/) 

PHP dependencies maintained on [WordPress Packagist](https://wpackagist.org/) are managed via `composer.json`.  

```
// add install path of plugin into "require" section

"require": {
    "wpackagist-plugin/contact-form-7": "^5.0.4",
}

// run an update
composer update
```

If your desired plugin is not listed on wpackist.org, you can simply copy the repository into `/vendor` directory

#### [NPM](https://www.npmjs.com/) 

All JavaScript dependencies are managed via `package.json`. 

```
// update predefined repositories 
npm install 

// add a new repository to package.json
npm install [package-name]

```

## Theme configuration 
Theme files are located at `/web/app/themes/base-theme/`. Manage configuration with custom classes. 
All classes are located within `/classes` directory. Setup of a basic class is as follows:

```
<?php 

namespace YourNameSpace;

class Theme 
{
    public function __constructor()
    {
        // define when the function should be executed
        add_action('after_setup_theme', [$this, 'setup'] );
    }
    
    public function setup()
    {
        add_theme_support('post-thumbnails');
        add_image_size('1200x400', 1200,400);
    }
}
```

All classes need to be instantiated via `functions.php`

```
<?php 

new \YourNameSpace\Theme();
```
