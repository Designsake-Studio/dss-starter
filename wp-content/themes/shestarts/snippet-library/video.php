<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
global $post;

if(isset($src) && $src == 'sub') {
$url = get_sub_field('video_url');
$img = get_sub_field('video_still');
$title = get_sub_field('video_title');

} else {
  $url = get_field('video_url');
$img = get_field('video_still');
$title = get_field('video_title');

}

$size = isset($size) ? $size : 'large';

// get vimeo object
$url = $url;
$parsedURL = parse_url($url);
$vidQuery = $parsedURL['path'];
$vidID = str_replace('/','',$vidQuery);
$hash = simplexml_load_file("https://vimeo.com/api/v2/video/$vidID.xml");
$defaultThumb = $hash->video[0]->thumbnail_large;

if(!empty($img)) {
  $vid_img = $img['sizes'][$size];
}
else {
  $vid_img = $defaultThumb;
}

?>


<div class="card-video">
  <a href="<?php echo $url; ?>" title="Watch Now: <?php echo $hash->video[0]->title; ?>" class="popup-video js-popup-video">
    <img src="<?php echo $vid_img; ?>" alt="<?php echo $hash->video[0]->title; ?>" class="img">
    <span class="video-trigger"></span>
  </a>
  <?php if(!empty($title)) { echo '<h5 class="title">Watch: '. $title .'</h5>';} ?>
</div><!-- /video-wrap -->


