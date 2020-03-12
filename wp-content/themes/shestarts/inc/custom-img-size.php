<?php

if ( function_exists( 'add_image_size' ) ) {

	add_image_size( 'full_screen', 1680, 1200 ); // Ideal dimensions for load times on full width images
  add_image_size( 'lg_thumb', 500, 500, true ); // Force crop

}