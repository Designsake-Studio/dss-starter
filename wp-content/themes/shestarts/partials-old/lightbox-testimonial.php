
<?php
$feat_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');

if($feat_img) { $url = $feat_img['0']; }

?>


<section class="lightbox-testimonial">
  <div class="max-width-sm">

    <?php get_template_part( 'partials/content-testimonial' );?>

  </div><!-- /max-width -->
</section>
