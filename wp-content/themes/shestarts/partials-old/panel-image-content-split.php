<?php
/**
 * Template part for panel image content split
 *
 * @package shespeaksincode
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }
global $post;


/** CONTENT VARS
 *
 *  Sets vars for each content fieldset
 *  ----------------------------------- */

//$header = get_sub_field('header');
//$line = get_sub_field('add_line');
$img = get_sub_field('image');
$content = get_sub_field('content');
//$text = get_sub_field('text');

/** APPEARANCE & LAYOUT VARS
 *
 *  Sets vars for each layout fieldset
 *  ----------------------------------- */

$pos = get_sub_field('image_position');
$align = get_sub_field('image_align');
$size = get_sub_field('image_size');
$detail = get_sub_field('box_detail');
$justify = get_sub_field('justify_text');

$classes = '';

$classes .= (!empty($pos) && $pos != 'left') ? ' align-'.$pos : '';
$classes .= (!empty($align) && $align != 'default') ? ' vert-'.$align : '';
$classes .= (!empty($size) && $size != 'third') ? ' size-'.$size : '';
$classes .= $detail ? ' img-shadow' : '';
$classes .= $justify ? '' : ' no-justify';

if($size == 'half') {
  $size = 'alt_lg';
}
elseif($size == 'two_thirds') {
  $size = 'large';
}
else {
  $size = 'alt_med';
}

?>


<section class="flex-panel panel-image-content-split<?php echo $classes; ?>">
  <div class="max-width">
    <div class="image-content-split">
      <?php
      if(!empty($img)) { echo '<div class="img-wrap"><img src="'. $img['sizes'][$size]. '" alt="'. alt($img) . '" class="img" /></div><!-- /img-wrap -->'; } ?>
      <div class="content-wrap">
      <?php

      if(!empty($content)) { echo '<div class="content wysiwyg">'. $content. '</div>'; } ?>
      </div>


    </div><!-- /callout-box -->
  </div><!-- /max-width -->
</section>
