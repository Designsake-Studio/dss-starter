<?php
/**
 * Template part for testimonials list
 *
 * @package shespeaksincode
 */


$args = array(
  'post_type'   => 'testimonial',
  'posts_per_page' => '99',
  'order' => 'ASC',
  'orderby' => 'menu_order date',
);

$testimonials = new WP_Query( $args );

if( $testimonials->have_posts() ) : ?>

  <section class="panel-list-testimonials js-testimonials">
    <div class="max-width">
    <?php
    while( $testimonials->have_posts() ) :

      $testimonials->the_post();
      get_template_part('partials/card-testimonial');

    endwhile;
    ?>
    </div><!-- /max-width -->
  </section>

  <?php
  endif;

  wp_reset_query();