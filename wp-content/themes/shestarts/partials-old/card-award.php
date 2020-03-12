<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
global $post;

//vars
$img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'card_thumb');
$img_url = $img['0'];
$img_alt = get_post_meta( get_post_thumbnail_id($post->ID),'_wp_attachment_image_alt', true );
$location = get_field('project_location');
$awardname = get_field('award_name');
$description = get_field('award_description');

$type = get_field('link_type');

        $link = get_field('url');
        $pdf = get_field('pdf_upload');
        if($type == 'link' && !empty($link)) { $permalink = $link; }
        elseif($type == 'pdf' && !empty($pdf)) { $permalink = $pdf; }
        if(empty($img_alt)) { $img_alt = $description; }

?>

<div class="award-card card-img">

  <?php
  if(!empty($img_url)) { echo '<img src="'. $img_url .'" alt="'. $img_alt .'" class="img" />'; }

  if(!empty($awardname)) { echo '<span class="badge">'.$awardname.'</span>'; }
  ?>
  <div class="caption">
    <div class="content">
      <?php if($description) { echo '<h4 class="title">'.$description.'</h4>';} ?>
      <h5 class="meta"><?php the_title(); ?></h5>

    </div>
  </div>
</div>