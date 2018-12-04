# WP Base

This is an opinionated boilerplate for web development with WordPress. It is build upon [Bedrock](https://github.com/roots/bedrock).

## Dependency management 
We use tools to manage (install, update, delete) the PHP and JavaScript dependencies (e.g. WordPress Plugins, build tools) of the project.

### [Composer](https://getcomposer.org/) 

All PHP dependencies like plugins registered and maintained on [WordPress Packagist](https://wpackagist.org/) can be managed via `composer.json`: 

* run `composer.update` to update the defined plugins
* install new plugins by adding them to `composer.json` requirements in this format: `"wpackist-plugin/name-of-plugin" : "version"`
* if your desired plugin is not listed on wpackist.org, you can simply copy the repository into `/vendor` directory

### [NPM](https://www.npmjs.com/) 

All JavaScript dependencies of your project like build tools and Bootstrap are defined within the `package.json`.
* run `npm install` to update the pre-defined repositories 
* install new repositories with `npm install [package-name]`
* search for packages and related documentation on [npmjs.com](https://www.npmjs.com/)