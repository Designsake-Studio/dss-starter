<?php

/* SERVE COMPILED
/––––––––––––––––––––––––*/
// is production switch for serving up compiled stylesheets

function is_production() {
  return ( function_exists('is_wpe') && is_wpe() );
}

function is_staging() {
  return ( function_exists('is_wpe_snapshot') && is_wpe_snapshot() );
}

function _s_asset($target) {
  return get_stylesheet_directory_uri() . '/public/' . $target;
}


/* ASSET REVVING
/––––––––––––––––––––––––*/
// use 'gulp build' to generate new releases and builds

function _s_revved_asset($target) {
  $scripts = file_get_contents(STYLESHEETPATH . '/public/rev-manifest.json');
  $scripts = json_decode($scripts);
  if ( isset( $scripts->{$target} ) ) {
    return get_stylesheet_directory_uri() . '/public/' . $scripts->{$target};
  }
  return $target . ' :: file-not-found-in-public-dir';
}


/* THEME SUPPORT
/––––––––––––––––––––––––*/
// @link http://codex.wordpress.org/Function_Reference/add_theme_support

function codesake_theme_support() {
  add_theme_support('automatic-feed-links');
  add_theme_support('post-thumbnails');
  add_theme_support('responsive-embeds');
  add_theme_support('align-wide');
  add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    )
  );
}
add_action('after_setup_theme', 'codesake_theme_support');

function my_add_excerpts_to_pages() {
  add_post_type_support( 'page', 'excerpt' );
}

add_action( 'init', 'my_add_excerpts_to_pages' );


/* REGISTER MENUS
/––––––––––––––––––––––––*/
// @link http://codex.wordpress.org/Function_Reference/register_nav_menus

function codesake_register_menus() {
  register_nav_menus(
    array(
      'main_menu' => __( 'Main Menu' ),
    )
  );
}
add_action( 'init', 'codesake_register_menus' );


/* CUSTOM LOGO TO LOGIN
/––––––––––––––––––––––––*/
function codesake_login_head() {
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

add_action('login_head', 'codesake_login_head');



/* ADD HTML5 SHIV IF IE
/––––––––––––––––––––––––*/
// @link http://css-tricks.com/snippets/wordpress/html5-shim-in-functions-php/
function add_ie_html5_shim () {
  echo '<!--[if lt IE 9]>';
  echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
  echo '<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>';
  echo '<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>';
  echo '<![endif]-->';
}
add_action('wp_head', 'add_ie_html5_shim');



/* 2.1 WPHEAD CLEANUP
/––––––––––––––––––––––––*/
// from wpseed theme
// remove unused stuff from wp_head()

// function wpseed_wphead_cleanup () {
//   // remove the generator meta tag
//   remove_action('wp_head', 'wp_generator');
//   // remove wlwmanifest link
//   remove_action('wp_head', 'wlwmanifest_link');
//   // remove RSD API connection
//   remove_action('wp_head', 'rsd_link');
//   // remove wp shortlink support
//   remove_action('wp_head', 'wp_shortlink_wp_head');
//   // remove next/previous links (this is not affecting blog-posts)
//   remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
//   // remove generator name from RSS
//   add_filter('the_generator', '__return_false');
//   // disable emoji support
//   remove_action('wp_head', 'print_emoji_detection_script', 7);
//   remove_action('wp_print_styles', 'print_emoji_styles');
//   // disable automatic feeds
//   remove_action('wp_head', 'feed_links_extra', 3);
//   remove_action('wp_head', 'feed_links', 2);
//   // remove rest API link
//   remove_action( 'wp_head', 'rest_output_link_wp_head', 10);
//   // remove oEmbed link
//   remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10);
//   remove_action('wp_head', 'wp_oembed_add_host_js');
// }
// add_action('after_setup_theme', 'wpseed_wphead_cleanup');
