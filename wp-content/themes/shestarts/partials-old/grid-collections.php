<?php
/**
 * Template part for collections grid
 *
 * @package shespeaksincode
 */


$args = array(
  'post_type'   => 'collection',
  'posts_per_page' => '99',
  'order' => 'ASC',
  'orderby' => 'menu_order date',
);

$collections = new WP_Query( $args );

if( $collections->have_posts() ) : ?>

  <section class="post-grid grid-collections">
    <div class="wrapper">
    <?php
    while( $collections->have_posts() ) :

      $collections->the_post();
      get_template_part('partials/card-collection');

    endwhile;
    ?>
    </div>
  </section>

  <?php
  endif;

  wp_reset_query();