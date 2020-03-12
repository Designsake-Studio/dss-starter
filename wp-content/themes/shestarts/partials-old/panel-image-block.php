<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
global $post;

/**
 * Template part for panel image block
 *
 * @package shespeaksincode
 */

$num = get_sub_field('image_num');
$width = get_sub_field('block_width');
$lightbox = get_sub_field('lightbox');
$img1 = get_sub_field('image1');
$img1_alt = (!empty($img1['alt'])) ? $img1['alt'] : $img1['title'];
$img1_link = get_sub_field('image_link1');
$img2 = get_sub_field('image2');
$img2_alt = (!empty($img2['alt'])) ? $img2['alt'] : $img2['title'];
$img2_link = get_sub_field('image_link2');

$classes = '';
$classes .= (!empty($width) ) ? ' width-'.$width : '';
$classes .= (!empty($num) ) ? ' num-'.$num : '';
if($num == 'single' && $width == 'wide') {
  $size = 'full_screen';

}
elseif($num == 'double' && $width == 'content') {
  $size = 'portrait_thumb';
}
else {
  $size = 'large';
}
?>
<section class="flex-panel panel-image-block<?php echo $classes; ?>">
  <div class="max-width">
    <div class="img-wrapper">
    <?php
    if(!empty($img1)) :
      echo '<figure class="wp-caption">';
        // clightbox option
        if($lightbox) { echo '<a href="'.$img1['sizes']['full_screen'].'" class="js-popup-img">'; }
        else {
          // image link only applies if lightbox is NOT checked
          if(!empty($img1_link)) {
            echo '<a href="'.$img1_link.'" target="_blank" class="img-link">';
          }
        }
          echo '<img src="'. $img1['sizes'][$size] .'" alt="'. $img1_alt .'">';

        if($lightbox) {
          echo '</a><!-- /popup -->';
        }
        else {
          if(!empty($img1_link)) {
            echo '</a><!-- /img-link -->';
          }
        }
        if(!empty($img1['caption'])) { echo '<figcaption class="wp-caption-text">'. $img1['caption'] .'</figcaption>'; }
      echo '</figure>';
    endif;

    if($num == 'double' && !empty($img2)) :
      echo '<figure class="wp-caption">';
        if($lightbox) { echo '<a href="'.$img2['sizes']['full_screen'].'" class="js-popup-img">'; }
        else {
          // image link only applies if lightbox is NOT checked
          if(!empty($img2_link)) {
            echo '<a href="'.$img2_link.'" target="_blank" class="img-link">';
          }
        }
          echo '<img src="'. $img2['sizes'][$size] .'" alt="'. $img2_alt .'">';
        if($lightbox) { echo '</a>'; }
        else {
          if(!empty($img1_link)) {
            echo '</a><!-- /img-link -->';
          }
        }
        if(!empty($img2['caption'])) { echo '<figcaption class="wp-caption-text">'. $img2['caption'] .'</figcaption>'; }
      echo '</figure>';
    endif;
    ?>

    </div>
  </div><!-- /container -->
</section>
