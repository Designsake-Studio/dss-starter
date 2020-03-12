<?php
get_header();

if (have_posts()): while (have_posts()) : the_post(); ?>

  <h1><?php the_title(); ?></h1>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php the_content(); ?>
  <?php edit_post_link(); ?>
  </article>


<?php
endwhile; endif;
get_footer();
