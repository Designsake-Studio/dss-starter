<?php
/**
 * Template part for careers list
 *
 * @package shespeaksincode
 */


$args = array(
  'post_type'   => 'career',
  'posts_per_page' => '99',
  'order' => 'ASC',
  'orderby' => 'menu_order date',
);

$careers = new WP_Query( $args );

if( $careers->have_posts() ) :

  ?>

  <section class="panel-list-careers">
    <div class="max-width-xs">
    <?php
    while( $careers->have_posts() ) :

      $careers->the_post();
      get_template_part('partials/card-career');

    endwhile;
    ?>
    </div><!-- /max-width -->
  </section>

<?php

  endif;

  wp_reset_query();