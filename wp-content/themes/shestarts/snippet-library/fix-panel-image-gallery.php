<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
global $post;

/**
 * Template part for panel image gallery
 *
 * @package shespeaksincode
 */

$title = get_sub_field('heading');
$images = get_sub_field('image_gallery');

if(!empty($images)) :
?>
<section class="flex-panel panel-image-gallery">
  <div class="max-width">
    <?php if(!empty($title)) { echo '<h3 class="sub-line">'.$title.'</h3>'; } ?>
    <div class="gallery-wrap js-img-gallery">
      <div class="wrapper">
        <?php foreach($images as $image) : ?>
          <a href="<?php echo $image['sizes']['large']; ?>" class="js-popup-img" title="<?php echo $image['caption']; ?>">
            <img src="<?php echo $image['sizes']['md_thumb']; ?>" class="img" alt="<?php echo alt($image); ?>" />
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div><!-- /container -->
</section>
<?php endif;