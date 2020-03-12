<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package codesake
 */

get_header();
?>






      <article id="post-404">

        <h1><?php _e( 'Page not found', 'codesake' ); ?></h1>
        <h2>
          <a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'codesake' ); ?></a>
        </h2>
        <?php get_search_form(); ?>
      </article>






<?php
get_footer();
