<?php

$feat_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'alt_med');

if($feat_img) { $url = $feat_img['0']; }
$img_alt = get_post_meta( get_post_thumbnail_id($post->ID),'_wp_attachment_image_alt', true );


$id = $post->ID;
$link = '/wp-admin/admin-ajax.php?action=get_user_snippet&user_id='.$id;
?>

<div class="card-testimonial card-split <?php if(empty($url)) { echo 'no-post-thumb'; } ?>">

  <?php if(!empty($url)) { ?> <div class="img-wrap"><img src="<?php echo $url; ?>" class="img" alt="<?php echo $img_alt; ?>" /></div><!-- /img-wrap --><?php } ?>

  <div class="content-wrap">
    <header>
      <div class="line"></div>
      <h3 class="sub dark"><?php the_title(); ?></h3>
    </header>
    <div class="content">
      <blockquote>
        <p><?php echo niche_excerpt(40); ?></p>
        <footer>
        <a href="<?php echo $link; ?>" title="<?php the_title(); ?>" rel="bookmark" class="js-trigger text-link">Read Full Review</a>
      </footer>
      </blockquote>

    </div><!-- /content -->
  </div>
</div>
