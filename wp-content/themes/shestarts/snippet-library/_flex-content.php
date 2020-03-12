<?php
/**
 * Template part for flexible content
 *
 * @link https://www.advancedcustomfields.com/resources/flexible-content/
 *
 * @package shespeaksincode
 */


if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

global $post;


  if( have_rows('flexible_content') ):

       // loop through the rows of data
      while ( have_rows('flexible_content') ) : the_row();

          if( get_row_layout() == 'content_area' )   {
            get_template_part( 'partials/panel-content-area' );
          }

          elseif( get_row_layout() == 'image_content_split' )   {
            get_template_part( 'partials/panel-image-content-split' );
          }

          elseif( get_row_layout() == 'image_block' )   {
            get_template_part( 'partials/panel-image-block' );
          }

          elseif( get_row_layout() == 'callout_box' )   {
            get_template_part( 'partials/panel-callout-box' );
          }

          elseif( get_row_layout() == 'content_block' )   {
            get_template_part( 'partials/panel-content-block' );
          }

          elseif( get_row_layout() == 'image_gallery' )   {
            get_template_part( 'partials/panel-image-gallery' );
          }

          elseif( get_row_layout() == 'video' )   {
            get_template_part( 'partials/panel-video' );
          }

          elseif( get_row_layout() == 'spacer' )   {
            echo '<div class="spacer"></div>';
          }

          elseif( get_row_layout() == 'hr' )   {
            echo '<hr/>';
          }



      endwhile;

  else :

      // no layouts found

  endif;

  ?>
