<?php
/**
 * Template part for project grid
 *
 * @package shespeaksincode
 */


$args = array(
  'post_type'   => 'editorial',
  'posts_per_page' => '99',
  'order' => 'DESC',
  'orderby' => 'date menu_order',
);

$editorials = new WP_Query( $args );

if( $editorials->have_posts() ) : ?>

  <section class="post-grid grid-editorials">
    <div class="wrapper">
    <?php
    while( $editorials->have_posts() ) :

      $editorials->the_post();
      get_template_part('partials/card-editorial');

    endwhile;
    ?>
    </div>
  </section>

  <?php
  endif;

  wp_reset_query();