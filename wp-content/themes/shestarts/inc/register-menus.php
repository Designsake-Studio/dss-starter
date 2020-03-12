<?php
/**
 * Registers navigation menu locations for a theme.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus
 *
 * @package shespeaksincode
 */

function shespeaksincode_register_menus() {
  register_nav_menus(
    array(
      'main_menu' => __( 'Main Menu' ),
      'footer_menu' => __( 'Footer Menu' ),
    )
  );
}

add_action( 'init', 'shespeaksincode_register_menus' );