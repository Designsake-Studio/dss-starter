<?php
// AJAX call to output team member on click
function get_user_snippet(){
  $id = intval( $_GET['user_id'] );
  global $post;
  $post = get_post( $id );
  setup_postdata( $post );
  get_template_part( 'partials/lightbox-testimonial');
  exit;
}
add_action('wp_ajax_get_user_snippet', 'get_user_snippet');
add_action('wp_ajax_nopriv_get_user_snippet', 'get_user_snippet');