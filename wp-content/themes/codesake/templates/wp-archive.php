<?php
get_header(); ?>

  <h1><?php _e( 'Archives', 'codesake' ); ?></h1>
  <?php get_template_part('partials/loop'); ?>
  <?php get_template_part('partials/pagination'); ?>

<?php
get_footer();
