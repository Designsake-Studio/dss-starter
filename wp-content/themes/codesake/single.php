<?php
get_header();

if (have_posts()): while (have_posts()) : the_post(); ?>


  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


    <?php if ( has_post_thumbnail()) : ?>
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <?php the_post_thumbnail(); ?>
      </a>
    <?php endif; ?>

    <h1><?php the_title(); ?></h1>

    <!-- post details -->
    <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
    <span class="author"><?php _e( 'Published by', 'codesake' ); ?> <?php the_author_posts_link(); ?></span>
    <span class="comments">
      <?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'codesake' ), __( '1 Comment', 'codesake' ), __( '% Comments', 'codesake' )); ?>

    </span>
    <!-- /post details -->

    <?php the_content(); // Dynamic Content ?>
    <?php the_tags( __( 'Tags: ', 'codesake' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>
    <p><?php _e( 'Categorised in: ', 'codesake' ); the_category(', '); // Separated by commas ?></p>
    <p><?php _e( 'This post was written by ', 'codesake' ); the_author(); ?></p>
    <?php edit_post_link(); // Always handy to have Edit Post Links available ?>
    <?php comments_template(); ?>

  </article>


<?php
endwhile; endif;
get_footer();
