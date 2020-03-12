<?php
/**
 * Template part for homepage content
 *
 * @package shespeaksincode
 */
$location = get_field('project_location');
$sub = get_field('keyword_sub_header');
$feat = get_field('featured_quote');
$img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'card_thumb');
$img_url = $img['0'];
$img_alt = get_post_meta( get_post_thumbnail_id($post->ID),'_wp_attachment_image_alt', true );
$images = get_field('project_gallery');

$feat_mobile = $images['0']['sizes']['medium_large'];

?>
<?php if(!empty($img_url)) { echo '<img src="'. $feat_mobile .'" alt="'. get_the_title() .' - '.$location.' Interior Designer" class="img mobile-hero" />'; } ?>
<section class="project-content">
  <div class="container-fluid max-width">
    <div class="row">
      <div class="col-sm-8">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <header class="entry-header">
            <?php if(!empty($sub)) { ?><h3 class="sub-line"><?php echo $sub; ?></h3> <?php } ?>
            <h1 class="title h2"><?php the_title(); ?></h1>
          </header><!-- .entry-header -->

          <div class="entry-content wysiwyg">
            <?php the_content(); ?>
          </div><!-- .entry-content -->

          <?php if(!empty($feat)) : ?>

          <div class="quote-wrap js-testimonials">
            <blockquote>
              <p><?php echo $feat; ?></p>

            <?php if(get_field('full_link')) {
              $id = get_field('linking_testimonial');
              $link = '/wp-admin/admin-ajax.php?action=get_user_snippet&user_id='.$id; ?>
             <footer><a href="<?php echo $link; ?>" class="text-link js-trigger">Read Client Review</a></footer>

            <?php } ?>
            </blockquote>
          </div>
          <?php endif; ?>
          <?php get_template_part( 'partials/hero', 'project-xs' ); ?>

        </article><!-- #post-<?php the_ID(); ?> -->
      </div><!-- /col -->
      <div class="col-sm-4">
        <?php get_sidebar('project'); ?>
      </div>
    </div>
  </div>
</section>