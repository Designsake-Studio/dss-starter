<?php
/**
 * Template part for project grid
 *
 * @package shespeaksincode
 */


$args = array(
  'post_type'   => 'project',
  'posts_per_page' => '99',
  'order' => 'ASC',
  'orderby' => 'menu_order date',
);

$projects = new WP_Query( $args );

if( $projects->have_posts() ) : ?>

  <section class="post-grid grid-projects">
    <div class="wrapper">
      <?php
      while( $projects->have_posts() ) :

        $projects->the_post();
        get_template_part('partials/card-project');

      endwhile;
      ?>
    </div><!-- /wrapper -->
  </section>

  <?php
  endif;

  wp_reset_query();