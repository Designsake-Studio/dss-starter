<?php
/**
 * Template part for project grid
 *
 * @package shespeaksincode
 */


$args = array(
  'post_type'   => 'award',
  'posts_per_page' => '99',
  'order' => 'ASC',
  'orderby' => 'menu_order date',
);

$awards = new WP_Query( $args );

if( $awards->have_posts() ) : ?>

  <section class="post-grid grid-awards">
    <div class="wrapper">
    <?php
    while( $awards->have_posts() ) :

      $awards->the_post();
      get_template_part('partials/card-award');

    endwhile;
    ?>
    </div>
  </section>

  <?php
  endif;

  wp_reset_query();