<?php
/**
 * Template part for single project hero at mobile
 *
 * @package shespeaksincode
 */

$images = get_field('project_gallery');

if(!empty($images)) : ?>

<section class="hero-project-xs panel-image-gallery mobile-hero">

  <div class="gallery-wrap js-img-gallery">
    <div class="wrapper">
      <?php foreach($images as $image) : ?>
        <a href="<?php echo $image['sizes']['large']; ?>" class="js-popup-img" title="<?php echo $image['caption']; ?>">
          <img src="<?php echo $image['sizes']['sm_thumb']; ?>" class="img" alt="<?php echo alt($image); ?>" />
        </a>
      <?php endforeach; ?>
    </div><!-- /wrapper -->
  </div><!-- /gallery-wrap -->

</section>


<?php endif;