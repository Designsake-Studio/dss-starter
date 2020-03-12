<?php

/*
// ACF PRO Options pages
-----------------------------
> http://www.advancedcustomfields.com/resources/register-multiple-options-pages/
> http://www.advancedcustomfields.com/resources/acf_add_options_sub_page/

*/

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Global Content',
		'menu_title'	=> 'Global Content',
		'menu_slug' 	=> 'global-content',
		'capability'	=> 'edit_posts',
		'icon_url'		=> 'dashicons-admin-site',
		'redirect'		=> false // This allows the parent to have it's own page instead of redirecting to the first child.
	));

}


