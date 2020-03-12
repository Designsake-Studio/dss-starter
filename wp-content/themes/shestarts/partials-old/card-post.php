<?php

$feat_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'alt_med');

if($feat_img) { $url = $feat_img['0']; }
//else { $url = backup_img('medium'); }

?>

<div class="card-post card-split <?php if(empty($url)) { echo 'no-post-thumb'; } ?>">

  <?php if(!empty($url)) { ?>
    <div class="img-wrap">
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
        <img src="<?php echo $url; ?>" class="img" alt="<?php the_title(); ?>" />
      </a>
    </div><!-- /img-wrap -->
  <?php } ?>

  <div class="content-wrap">
    <header>
      <div class="line"></div>



      <h3 class="header"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
      <p class="sub"><time datetime="<?php the_time('Y-m-d'); ?>" itemprop="datePublished"><?php the_time('M d, Y'); ?></time></p>
    </header>
    <div class="content">
      <div class="text-wrap text-justify">
        <p><?php echo niche_excerpt(40); ?></p>
      </div><!-- /text-wrap -->

      <footer>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark" class="text-link">Read More</a>
      </footer>
    </div><!-- /content -->
  </div><!-- /content-wrap -->
</div><!-- /card-post -->
