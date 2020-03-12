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
$bg = get_sub_field('bg_color');
$align = get_sub_field('text_align');
$layout = get_sub_field('layout');
$justify = get_sub_field('justify_text');
$classes = '';

$classes .= (!empty($bg) ) ? ' bg-'.$bg : '';
$classes .= (!empty($align) ) ? ' align-'.$align : '';
$classes .= (!empty($layout) ) ? ' layout-'.$layout : '';
$classes .= $justify ? '' : ' no-justify';
?>


<section class="flex-panel panel-content-block<?php echo $classes; ?>">
  <div class="max-width">
    <div class="content-wrap">
      <?php
      if(!empty($header)) { echo '<h5 class="header sub-line">'. $header. '</h5>'; }
      if(!empty($text)) { echo '<div class="entry-content wysiwyg">'.$text.'</div>'; }
      ?>
    </div><!-- /content-box -->
  </div><!-- /max-width -->
</section>
