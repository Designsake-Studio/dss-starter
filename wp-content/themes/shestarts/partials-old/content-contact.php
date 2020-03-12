<?php
/**
 * Template part for page content
 *
 * @package shespeaksincode
 */

$custom_title = get_field('page_title');
$title = !empty($custom_title) ? $custom_title : get_the_title();
$content = get_the_content();
$image = get_field('studio_image');
?>

<section class="page-content">
  <div class="container-fluid max-width">
    <div class="row">

      <div class="col-xs-8 col-xs-push-4 col-xxs-12 col-xxs-push-0">
        <?php if(!empty($image)) { echo '<img src="'. $image['sizes']['medium_large'] .'" alt="'. alt($image) .'" class="img contact-img" />'; } ?>
      </div><!-- /col -->
      <div class="col-xs-4 col-xs-pull-8 col-xxs-12 col-xxs-pull-0">
        <?php
        // TITLE
        if(!empty($title)) {
          echo '<h1 class="entry-title sub-line">'.$title.'</h1>';
        }

        // CONTENT
        if(!empty($content)) {

          echo '<div class="entry-content native wysiwyg">';
            the_content();
          echo '</div><!-- /entry-content -->';

        }
        ?>
      </div><!-- /col -->



    </div><!-- /row -->

  </div><!-- /max-width -->
</section>