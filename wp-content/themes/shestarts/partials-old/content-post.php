<?php
/**
 * Template part for page content
 *
 * @package shespeaksincode
 */

$custom_title = get_field('page_title');
$title = !empty($custom_title) ? $custom_title : get_the_title();
$content = get_the_content();
?>


<div class="max-width-xs">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
      <div class="line"></div>
      <h1 class="entry-title"><?php the_title(); ?></h1>

      <div class="entry-meta-wrap">
        <p class="entry-meta">
          <?php
          the_time('F j, Y');

          $cats = get_the_category();
          if($cats) {
            echo ' | <span class="cats">';
            foreach($cats as $cat) {
              echo '<a href="/category/' .$cat->slug. '" class="cat">' .$cat->name. '</a>';
            }
            echo '</span>';
          } ?>
        </p>
        <?php get_template_part( 'partials/_social-media' ); ?>
      </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <?php if(!empty($content)) { ?>
      <div class="entry-content native wysiwyg">
        <?php the_content(); ?>
      </div><!-- /entry-content -->
  <?php } ?>

  </article><!-- #post-<?php the_ID(); ?> -->
</div>


