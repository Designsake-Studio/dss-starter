<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
global $post;

//vars
$img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'portrait_thumb');
$img_url = $img['0'];
$img_alt = get_post_meta( get_post_thumbnail_id($post->ID),'_wp_attachment_image_alt', true );
$location = get_field('project_location');

$pub = get_field('publication_name');

$date = get_the_time('M Y');

$type = get_field('link_type');

$link = get_field('url');
$pdf = get_field('pdf_upload');
if($type == 'link' && !empty($link)) { $permalink = $link; }
elseif($type == 'pdf' && !empty($pdf)) { $permalink = $pdf; }
if(empty($img_alt)) { $img_alt = $pub.' Press'; }
?>



<a href="<?php echo $permalink; ?>" target="_blank" class="editorial-card card-img">
  <?php if(!empty($img_url)) { echo '<img src="'. $img_url .'" alt="'. $img_alt .'" class="img" />'; } ?>

  <button class="btn btn-white">Read Feature</button>
  <div class="caption">
    <div class="content">
      <?php
      if(!empty($pub)) {
        echo '<h4 class="title">'.$pub.'</h4>';
      } ?>
      <?php if($date) { echo '<h5 class="meta">'.$date.'</h5>';} ?>
    </div>
  </div>
</a>
