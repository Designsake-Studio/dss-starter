<?php
/**
 * Template part for post feed
 *
 * @package shespeaksincode
 */


?>

<section class="panel-post-feed panel-image-content-split">
  <div class="max-width">

    <?php
    while ( have_posts() ) : the_post();

      get_template_part('partials/card-post');

    endwhile;

    if ( function_exists('wp_bootstrap_pagination') )
              wp_bootstrap_pagination();


    ?>
  </div><!-- /max-width -->
</section>

