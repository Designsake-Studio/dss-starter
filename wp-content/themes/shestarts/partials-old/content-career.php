<?php
/**
 * Template part for single career content
 *
 * @package shespeaksincode
 */



$custom_title = get_field('page_title',12482);
$title = !empty($custom_title) ? $custom_title : 'Now Hiring';
$content = get_the_content();
$intro_text = get_field('intro_text',12482);
$text_area = get_field('intro_text_area',12482);
?>

<section class="page-content">
  <div class="max-width-xs">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <header class="entry-header">
        <?php if(!empty($title)) { echo '<h2 class="entry-title sub-line">'.$title.'</h2>'; } ?>
        <h1 class="entry-title"><?php the_title(); ?></h1>

      </header><!-- .entry-header -->

      <div class="entry-content wysiwyg">
        <?php the_content(); ?>
      </div>

      <footer class="entry-footer">
        <p><a href="#career" class="btn btn-lg js-o-trigger">Apply Now</a></p>
        <p><a href="/careers/" class="back-link">Back to all Careers</a></p>
      </footer>


    </article><!-- #post-<?php the_ID(); ?> -->

  </div><!-- /max-width -->
</section>



