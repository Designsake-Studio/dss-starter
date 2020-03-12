<?php
/**
 * Template part for collections card
 *
 * @package shespeaksincode
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }
global $post;

//vars
$img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'lg_thumb');
$img_url = $img['0'];
$img_alt = get_post_meta( get_post_thumbnail_id($post->ID),'_wp_attachment_image_alt', true );
if(empty($img_alt)) { $img_alt = get_the_title().' Design'; }
?>

<a href="<?php the_permalink(); ?>" class="collection-card card-img">
  <?php if(!empty($img_url)) { echo '<img src="'. $img_url .'" alt="'. $img_alt .'" class="img" />'; } ?>
  <div class="caption">
    <div class="content">
      <h4 class="title"><?php the_title(); ?></h4>
    </div>
  </div>
</a>
