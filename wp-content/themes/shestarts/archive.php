<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package codesake
 */

get_header();
?>

  <section>

      <h1><?php _e( 'Archives', 'codesake' ); ?></h1>

      <?php get_template_part('partials/loop'); ?>

      <?php get_template_part('partials/pagination'); ?>

    </section>

<?php
get_footer();
