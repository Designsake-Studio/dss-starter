<?php

// spacer
function spacer_shortcode( $atts, $content = null ) {
 return '<div class="spacer"></div>';
}
add_shortcode( 'spacer', 'spacer_shortcode' );


// text link
function text_link_shortcode( $atts, $content = null ) {
 $a = shortcode_atts( array(
   'link' => ''
 ), $atts );

 return '<a href="' . esc_attr($a['link']) . '" class="text-link">' . $content . '</a>';
}
add_shortcode( 'fancy_link', 'text_link_shortcode' );

// video
function popup_video( $atts, $content = null ) {

  $a = shortcode_atts( array('link' => '',), $atts );

  $parsedURL = parse_url($a['link']);
  $host = $parsedURL['host'];

  if (strpos($host, 'youtube') !== false) {
    $vidQuery = $parsedURL['query'];
    $vidID = str_replace('v=','',$vidQuery);
    $defaultThumb = 'https://img.youtube.com/vi/'.$vidID.'/maxresdefault.jpg';
  }
  elseif (strpos($host, 'vimeo') !== false) {
    $vidQuery = $parsedURL['path'];
    $vidID = str_replace('/','',$vidQuery);
    $hash = simplexml_load_file("https://vimeo.com/api/v2/video/$vidID.xml");
    $defaultThumb = $hash->video[0]->thumbnail_large;
  }

 return '<a href="' . esc_attr($a['link']) . '" class="js-popup-video popup-video">' . (empty($content) ? '<img src="'.$defaultThumb.'" alt="" />' : $content ) . '<span class="video-trigger"></span></a>';
}
add_shortcode( 'popup', 'popup_video' );

/*
*  Social Bar Shortcode
*  - build ul with social media data from Global options page
*************************************************************************************/
// $sections = isset($sections) ? $sections : get_sub_field('content');

function build_social_bar(){
  $rows = get_field('social_media','option' ); // get all the rows
  if($rows) {
    $liArray = '<ul class="social-bar">';
    foreach( $rows as $row ) :
        $liArray .= '<li><a href="'. $row['sm_social_link'] .'" class="link"><i class="fab fa-'.$row['sm_social_site'].'"></i></a></li>';
    endforeach;
    $liArray .= '</ul>';
  }
  return $liArray;
}

add_shortcode( 'social_bar', 'build_social_bar' );

