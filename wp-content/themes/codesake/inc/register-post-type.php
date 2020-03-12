<?php
/**
 * Registers custom post types
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 *
 * @package codesake
 */

add_action( 'init', 'create_post_type' );

function create_post_type() {

	register_post_type( 'project',
		array (
			'label' => 'Project',
			'description' => '',
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'has_archive' => true,
			'rewrite' => true,
			'query_var' => true,
			'supports' => array('title','editor','thumbnail','page-attributes'),
			'taxonomies' => array(),
			'menu_icon' => 'dashicons-star-filled',
			'labels' =>
			array (
				'name' => 'Projects',
				'singular_name' => 'Project',
				'menu_name' => 'Projects',
				'add_new' => 'Add Project',
				'add_new_item' => 'Add New Project',
				'edit' => 'Edit',
				'edit_item' => 'Edit Project',
				'new_item' => 'New Project',
				'view_item' => 'View Project',
				'search_items' => 'Search Projects',
				'not_found' => 'No Projects Found',
				'not_found_in_trash' => 'No Projects Found in Trash' /* This displays if there is nothing in the trash */
			),
		)
	);

	// This post type is not public
	register_post_type( 'testimonial',
		array (
			'label' => 'Testimonial',
			'description' => '',
			'public' => false,
			'publicly_queryable' => false,
			'show_ui' => true,
			'show_in_menu' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'has_archive' => false,
			'rewrite' => true,
			'query_var' => true,
			'supports' => array('title','editor','thumbnail','excerpt','page-attributes'),
			'taxonomies' => array(),
			'menu_icon' => 'dashicons-format-quote',
			'labels' =>
				array (
  				'name' => 'Testimonials',
  				'singular_name' => 'Testimonial',
					'menu_name' => 'Testimonials',
					'add_new' => 'Add Testimonial',
					'add_new_item' => 'Add New Testimonial',
					'edit' => 'Edit',
					'edit_item' => 'Edit Testimonial',
					'new_item' => 'New Testimonial',
					'view_item' => 'View Testimonial',
					'search_items' => 'Search Testimonials',
					'not_found' => 'No Testimonials Found',
					'not_found_in_trash' => 'No Testimonials Found in Trash'
				),
		)
	);

}
