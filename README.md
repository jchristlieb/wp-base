# WP Base

This is an opinionated boilerplate for web development with WordPress. It is build upon [Bedrock](https://github.com/roots/bedrock).

## Dependency management 
We use tools to manage (install, update, delete) the PHP and JavaScript dependencies (e.g. WordPress Plugins, build tools) of the project.

### [Composer](https://getcomposer.org/) 

All PHP dependencies like plugins registered and maintained on [WordPress Packagist](https://wpackagist.org/) can be managed via `composer.json`.  

* `composer.json` file is used to define (name and version) the projects PHP dependencies 
* `composer update` -> update the defined plugins
* install new plugins by adding them to `composer.json` requirements in this format: `"wpackist-plugin/name-of-plugin" : "version"`
* if your desired plugin is not listed on wpackist.org, you can simply copy the repository into `/vendor` directory

### [NPM](https://www.npmjs.com/) 

All JavaScript dependencies like build tools and Bootstrap. 
* `package.json` file is used to define (name and version) the projects JavaScript dependencies.
* `npm install` -> update the pre-defined repositories 
* `npm install [package-name]` -> install new repositories (search for packages and related documentation on [npmjs.com](https://www.npmjs.com/))