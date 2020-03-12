<?php
/**
 * Template part for panel callout box
 *
 * @package shespeaksincode
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }
global $post;

/** CONTENT VARS
 *
 *  Sets vars for each content fieldset
 *  ----------------------------------- */


$img = get_sub_field('image');
$header = get_sub_field('header');
$text = get_sub_field('text');


/** APPEARANCE & LAYOUT VARS
 *
 *  Sets vars for each layout fieldset
 *  ----------------------------------- */

$pos = get_sub_field('image_position');
$bg = get_sub_field('bg_color');

$classes = '';

$classes .= (!empty($pos) && $pos != 'left') ? ' align-'.$pos : '';
$classes .= (!empty($bg) ) ? ' bg-'.$bg : '';

?>
<section class="flex-panel panel-callout-box<?php echo $classes; ?>">
  <div class="max-width">
    <div class="callout-box">
      <?php
      if(!empty($img)) { echo '<img src="'. $img['sizes']['large']. '" alt="'. alt($img). '" class="img" />'; }
      ?>
      <div class="content-box">
        <?php
        if(!empty($header)) { echo '<h5 class="header sub-line">'. $header. '</h5>'; }
        if(!empty($text)) { echo '<div class="lead"><p>'. $text. '</p></div>'; }
        if(!empty(get_sub_field('btn_text'))) { get_template_part( 'partials/button' ); } ?>
      </div><!-- /content-box -->
    </div><!-- /callout-box -->
  </div><!-- /max-width -->
</section>
