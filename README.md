
# WP THEME ZONE

### Requirements

__WP Theme Zone__ requires the following dependencies:

- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/)
- [Gulp](https://gulpjs.com/)

## Installation
There are several ways to install __WP Theme Zone__. We'll look at three of them: (1) classic install by uploading __WP Theme Zone__ to a WordPress install, and (2) using npm

### Classic install
- Download or clone this repository from Github
- IMPORTANT: If you download it from GitHub make sure you rename the "wp-theme-zone-master.zip" file just to "wp-theme-zone.zip" or you might have problems using child themes!
- Upload it into your WordPress installation theme subfolder: `/wp-content/themes/`
- Login to your WordPress backend
- Go to Appearance → Themes
- Activate the __WP Theme Zone__

### npm install
- Open your terminal
- Change to the directory where you want to add __WP Theme Zone__
- Type `npm install wp-theme-zone`

## Developing With npm, Gulp and SASS and Browser Sync

### Installing Dependencies
- Make sure you have installed Node.js and Browser-Sync (optional) on your computer globally
- Then open your terminal and browse to the location of your __WP Theme Zone__ copy
- Run: `$ npm install` : install the dependencies.
- Run: `$ gulp copy-assets` : Copy all needed dependency assets files from node_modules to theme's /js, /scss and /fonts folder. Run this task after npm update.

### Running
To work with and compile your Sass files on the fly start:

- `$ gulp watch`

Or, to run with Browser-Sync:

- First change the browser-sync options to reflect your environment in the file `/gulpconfig.json` in the beginning of the file:
```javascript
{
    "browserSyncOptions" : {
        "proxy": "localhost/theme_test/", // <----- CHANGE HERE
        "notify": false
    },
    ...
};
```
- then run: `$ gulp watch-bs`

### Available CLI commands

`Wp-theme-zone` comes packed with CLI commands tailored for WordPress theme development :

- `gulp watch` : automize compiling the custom css on the `wp-theme-zone/sass/theme/_theme.scss` with the existing css. 
- `gulp compile` : manual compiling the custom css on the `wp-theme-zone/sass/theme/_theme.scss` with the existing css. 
- `gulp watch-bs` : reloads page automatically on your browser.

## Confused by All the CSS and Sass Files?

Some basics about the Sass and CSS files that come with __WP Theme Zone__:
- The theme itself uses the `/style.css`file only to identify the theme inside of WordPress. The file is not loaded by the theme and does not include any styles.
- The `/css/theme.css` and its minified little brother `/css/theme.min.css` file(s) provides all styles. It is composed of five different SCSS sets and one variable file at `/sass/theme.scss`:

 ```
 // 1. Add your variables into this file. Also add variables to overwrite Bootstrap or __WP Theme Zone__ variables here
 @import "theme/theme_variables"; 
 // 2. All the Bootstrap stuff - Don´t edit this! 
 @import "assets/bootstrap4";  
 // 3. Some basic WordPress stylings and needed styles to combine Boostrap and WP Theme Zone
 @import "themezone/themezone"; 
 // 4. Font Awesome Icon styles
 @import "assets/font-awesome";
 // Any additional imported files //
 // 5. Add your styles into this file
 @import "theme/theme";
 ```

- Don’t edit the number 2-4 files/filesets listed above or you won’t be able to update __WP Theme Zone__ without overwriting your own work!
- Your design goes into: `/sass/theme`.
  - Add your styles to the `/sass/theme/_theme.scss` file
  - And your variables to the `/sass/theme/_theme_variables.scss`
  - Or add other .scss files into it and `@import` it into `/sass/theme/_theme.scss`.
  - Also you can use the variables available here `../src/sass/bootstrap4/_variables.scss`. But take note that don't update that file.


## Getting the value of Theme Settings
There are several ways to get the settings of __WP Theme Zone__.
- By using a function
``` zn_option_get('option-id') ```
- By using a shortcode
``` do_shorcode('option-id') ```

## Acknowledgment
Thank you for the third party and libraries that is used into this wordpress theme.
* [Underscores](https://underscores.me/) - based theme
* [Bootstrap](https://getbootstrap.com/)
* [Fontawesome](https://fontawesome.com/)
* [base64](https://base64.guru/converter/encode/image)

## Contributor

* [Zekinah Lecaros](https://github.com/zekinah) - *main author*