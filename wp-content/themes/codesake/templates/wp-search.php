<?php
get_header(); ?>

  <h1><?php echo sprintf( __( '%s Search Results for ', 'codesake' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>
  <?php get_template_part('partials/loop'); ?>
  <?php get_template_part('partials/pagination'); ?>

<?php
get_footer();
