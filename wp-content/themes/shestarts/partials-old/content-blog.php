<?php
/**
 * Template part for blog page content
 *
 * @package shespeaksincode
 */


$indexID = get_option( 'page_for_posts' );

$custom_title = get_field('page_title', $indexID);
$title = !empty($custom_title) ? $custom_title : 'Journal';
$intro_text = get_field('intro_text', $indexID);
$text_area = get_field('intro_text_area', $indexID);
?>

<section class="page-content blog-content journal-intro">
  <div class="max-width">
    <div class="intro-content">
      <?php
      // TITLE
      if(!empty($title)) {
        echo '<h1 class="entry-title sub-line">'.$title.'</h1>';
      }
      // INTRO TEXT
      if(!empty($intro_text)) {
        echo '<div class="lead">'.$intro_text.'</div>';
      }

      // TEXT AREA
      if(get_field('add_intro_content', $indexID) == 'text' && !empty($text_area)) {
        echo '<div class="wysiwyg">'.$text_area.'</div>';
      }

      // VIDEO
      if(get_field('add_intro_content', $indexID) == 'video') {
        get_template_part( 'partials/card-video' );
      }

      get_template_part( 'partials/_social-media' ); ?>
    </div><!-- /intro-content -->

  </div><!-- /max-width -->
</section>
