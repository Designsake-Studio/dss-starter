<?php
/**
 * Template part for homepage content
 *
 * @package shespeaksincode
 */


$header = get_field('intro_header');
$content = get_field('intro_content');
?>
<section class="home-content">
  <div class="container-fluid max-width">
    <div class="row">
      <div class="col-xs-12">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <header class="entry-header">
            <h1 class="sub-line"><?php echo (!empty($header)) ? $header : get_the_title(); ?></h1>
          </header><!-- .entry-header -->

          <div class="entry-content wysiwyg">
            <?php echo (!empty($content)) ? $content : ''; ?>
          </div><!-- .entry-content -->

        </article><!-- #post-<?php the_ID(); ?> -->
      </div>
    </div>
  </div>
</section>