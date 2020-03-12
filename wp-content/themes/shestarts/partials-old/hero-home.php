<?php
/**
 * Template part for homepage hero
 *
 * @package shespeaksincode
 */


$images = get_field('gallery_images');
$first_color = $images[0]['header_text'];
if($images) : ?>


<section class="hero-home js-hero-home <?php echo ($first_color == 'light') ? 'header-light' : ''; ?>">
  <div class="js-home-slider home-slider">
    <?php
    while(has_sub_field('gallery_images')) :

      $image = get_sub_field('image');
      $align = get_sub_field('image_align');
      $color = get_sub_field('header_text'); ?>
    <div class="slide" <?php echo (isset($color)) ? 'data-nav="text-'.$color.'"' : ''; ?> >
      <div class="img-wrap <?php echo (isset($align)) ? $align : ''; ?>" style="background-image: url('<?php echo $image['sizes']['full_screen']; ?>');"></div><!-- /img-wrap -->
    </div><!-- /slide -->
  <?php endwhile; ?>

  </div>
</section>


<?php endif;