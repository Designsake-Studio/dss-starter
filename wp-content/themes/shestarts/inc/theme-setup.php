<?php

/*
 *  is production switch for serving up compiled stylesheets
 *  -------------------------------------------------------- */
function is_production() {
  return ( function_exists('is_wpe') && is_wpe() );
}

function is_staging() {
  return ( function_exists('is_wpe_snapshot') && is_wpe_snapshot() );
}

function _s_asset($target) {
  return get_stylesheet_directory_uri() . '/public/' . $target;
}


/*
 *  asset revving for serving up hashed files
 *  use 'gulp build' to generate new releases and builds
 *  -------------------------------------------------------- */
function _s_revved_asset($target) {
  $scripts = file_get_contents(STYLESHEETPATH . '/public/rev-manifest.json');
  $scripts = json_decode($scripts);
  if ( isset( $scripts->{$target} ) ) {
    return get_stylesheet_directory_uri() . '/public/' . $scripts->{$target};
  }
  return $target . ' :: file-not-found-in-public-dir';
}


/**
 * Theme Setup & Support
 *
 * @link http://codex.wordpress.org/Function_Reference/add_theme_support
 */


function shespeaks_setup() {

  add_theme_support('automatic-feed-links');
  add_theme_support('post-thumbnails');

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 'html5', array(
    'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
  ) );

}

add_action('after_setup_theme', 'shespeaks_setup');


function my_add_excerpts_to_pages() {
  add_post_type_support( 'page', 'excerpt' );
}

add_action( 'init', 'my_add_excerpts_to_pages' );


/**
 * Add Custom Logo to Login Page
 */

function shespeaks_login_head() {
  echo "
  <style>
    body.login #login h1 a {
      background-image: url('".get_bloginfo('template_url')."/assets/images/login.png');
      background-repeat: no-repeat;
      background-color: transparent;
      background-position: center center;
      background-size: contain;
      height: 140px;
      width: 100px;
      margin: 0 auto;
    }
  </style>
  ";
}

add_action('login_head', 'shespeaks_login_head');


/**
 * Add IE conditional HTML5 shim to header
 *
 * @link http://css-tricks.com/snippets/wordpress/html5-shim-in-functions-php/
 */

function add_ie_html5_shim () {
  echo '<!--[if lt IE 9]>';
  echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
  echo '<![endif]-->';
}
add_action('wp_head', 'add_ie_html5_shim');
