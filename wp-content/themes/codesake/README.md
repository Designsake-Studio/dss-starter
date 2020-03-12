
/*
 *  asset revving for serving up hashed files
 *  use 'gulp build' to generate new releases and builds
 *  -------------------------------------------------------- */


 serving up compiled stylesheets up date documentation

 ## 📚 HTML Structure
In WPSeed the following semantical structure is used on every site:
``` html
<header>           the page header containing the navigation and the logo
  <nav>            the main navigation
<main>             contains everything but navigation, footer and aside-elements
  <section>        serves as a structural container and/or fullwidth-background (repeatable)
    <article>      contains the content when the use of an article tag is semantically correct (repeatable)
<footer>           the page footer, can contain additional links and informations like address or logos
```

### Important Files/Folders

#### Functions
```
functions-custom.php      space for your own custom functions
functions-dev.php         functions used for development purposes
functions-gutenberg.php   space for functions to create custom Gutenberg-blocks with ACF, contains a preset
functions-settings.php    theme-settings and general functions that normally don't need much editing
functions-setup.php       the starting point for setting up a new theme, most settings are here
```

#### CSS
```
# used for development
assets/styles/vars.scss         this is your starting-point, it manages scaling, colors, fonts and other presets.
assets/styles/content.scss      content related styles
assets/styles/structure.scss    contains everything that is not content related like (header, footer and main navigations)
assets/styles/fonts.scss        locally hosted fonts

# normally don't need changes
assets/styles/essentials.scss   required SASS functions and all presets for responsive
assets/styles/general.scss      defaults and presets, inherits most of the variables from vars.scss
assets/styles/bundle.scss       gathers all .scss files for compiling with gulp
```

#### Javascript
```
assets/scrips/essentials.js   re-usable essential javascript/jQuery functions/variables
assets/scrips/functions.js    javascript/jQuery
modernizr-config.json         Modernizr configuration, see the "Modernizr" section above
modernizr.js                  Modernizr modules, see the "Modernizr" section above
```

#### Templates
The Wordpress default templates (like page.php, single.php) receive their content from the associated file inside the template folder. This way all templates are grouped together. `index.php` is forwarded to `page.php` to make it the default.

All templates should be seperated into two categories recognizable by their prefix:
* **`temp`**: individual site templates (none by default, an example would be `temp-contact.php`)
* **`wp`**: wordpress default templates.
* **`block`**: custom Gutenberg-blocks created with ACF.

```
blocks/block-*          if you want to create custom Gutenberg-blocks using acf, create them here and add them in functions-gutenberg.php.
wp-home.php             WP blog default
wp-page.php             WP page default
wp-single.php           WP post default
```
### Responsive/Fluid presets

#### Scaling
By default, the layout will scale with the viewport-width as all units are `rem` based and `html` uses font-size as the root unit.
This scaling can be configured at the `SIZE/SCALING` section in `vars.scss`. It is also possible to stop the scaling at a certain viewport-width. See instructions inside `vars.scss`.

#### Mixins/Classes
**defined by variables**
* The width of the two available variables `mobile` and `desktop` are defined in vars.scss. Usage (with default values):
* min 800px `@include desktop {...}`
* max 799px`@include mobile {...}`

**defined by individual pixel widths**
* at least 750px: `@include vpw_min(750px)`
* at most 500px: `@include vpw_max(500px)`
* between 1000px and 1200px: `vpw(1000px, 1200px)`

**defined by ascepct-ratio**
* at least 16:9: `@include asr_min(16,9) { ... }`
* at most 4:3: `@include asr_max(4,3) { ... }`

**defined by css-class**
the two available classes `mobile` and `desktop` perform as followed (with default values):
```SCSS
.desktop {
  // hidden while < 800px;
}
.mobile {
  // hidden while > 799;
}
```
