<?php
/**
 * Template part for single project hero
 *
 * @package shespeaksincode
 */

$images = get_field('project_gallery');

if(!empty($images)) : ?>


<section class="hero-project desktop-hero">
  <div class="js-project-slider project-slider">
    <?php
    foreach($images as $image) : ?>
    <div class="slide">
      <div class="img-wrap">
        <img src="<?php echo $image['sizes']['full_screen']; ?>" alt="<?php echo alt($image); ?>" class="img" />
      </div><!-- /img-wrap -->
    </div><!-- /slide -->
  <?php endforeach; ?>

  </div>
</section>

<?php endif;