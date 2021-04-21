# WP Plugin Starter

Welcome to the WP Plugin Starter repository on GitHub. Here you can browse the source, look at open issues and use this template to bootstrap your next WordPress plugin development.

Installation
---------------

### Requirements

WP Plugin Starter requires the following dependencies:

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)

### Quick Start

Click "Use this template" at the top of this page, or click [here](https://github.com/shivapoudel/wp-plugin-starter/generate) to create your repo and clone locally to your `wp-content/plugins` directory. After that you'll need to do a four-step find and replace on the name in all the templates.

1. Search for `WP Plugin Starter` to capture the plugin name and replace with: `Plugin Name`.
2. Search for `WP_Plugin_Starter` to capture the plugin namespace and replace with: `Plugin_Name`.
3. Search for `wp-plugin-starter` to capture the plugin slug, textdomain, etc. and replace with: `plugin-name`.
4. Search for `WPS_` (in uppercase) to capture constants and replace with: `PLUGIN_NAME_`.

Then, rename the plugin main file `wp-plugin-starter.php` to use the plugin's slug. Next, update or delete this readme.

### Setup

To start using all the tools that come with WP Plugin Starter you need to install the necessary Node.js and Composer dependencies:

```sh
$ composer install
$ npm install
```

Without performing this step, if you try to activate the plugin it will simply show an admin notice.

### Available CLI commands

WP Plugin Starter comes packed with CLI commands tailored for WordPress plugin development:

- `npm run build` - builds the code for production.
- `npm run start` - starts the build for development.
- `npm run format` - formats files in the entire project’s directories.
- `npm run lint:js` – lints JavaScript files in the entire project’s directories.
- `npm run lint:css` – lints CSS and SCSS files in the entire project’s directories.
- `npm run lint:php` – lints PHP files in the entire project’s directories.
- `composer makepot` : Generates a .pot file in the `languages/` directory.
- `composer makepot-audit`: Generates a .pot file in the `languages/` directory and run audit.

Now you're ready to go! The next step is easy to say, but harder to do: make an awesome WordPress plugin. :)

Good luck!
