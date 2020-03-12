<?php
/**
 * Template part for page content
 *
 * @package shespeaksincode
 */

$custom_title = get_field('page_title');
$title = !empty($custom_title) ? $custom_title : get_the_title();
$content = get_the_content();
$intro_text = get_field('intro_text');
$text_area = get_field('intro_text_area');
$max = get_field('max_width');
$align = get_field('content_align');
?>

<section class="page-content">
  <div class="max-width">

    <div class="intro-content">
      <header class="header<?php if(isset($align) && $align != 'left'){ echo ' align-'. $align; } ?>" <?php if(isset($max) && $max != 'none'){ echo 'style="max-width: '. $max .';"'; } ?>>

        <?php
        // TITLE
        if(!empty($title)) {
          echo '<h1 class="entry-title sub-line">'.$title.'</h1>';
        }

        // INTRO TEXT
        if(!empty($intro_text)) {
          echo '<div class="lead">' .$intro_text. '</div>';
        }
        ?>

      </header>

      <?php

      // VIDEO
      if(get_field('add_intro_content') == 'video') {
        get_template_part( 'partials/card-video' );
      }

      ?>

    </div><!-- /intro-content -->


    <?php

    // CONTENT
    if(!empty($content)) {

      echo '<div class="entry-content native wysiwyg">';
        the_content();
      echo '</div><!-- /entry-content -->';

    }
    ?>

  </div><!-- /max-width -->
</section>