<?php
/* ENQUEUE SCRIPTS
/––––––––––––––––––––––––*/
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style(
		'application',
		is_production()
			? _s_revved_asset('css/application.min.css')
			: _s_asset('css/application.css'),
		array(),
		''
	);

	$in_footer = true;
	wp_deregister_script('jquery');
	wp_enqueue_script(
		'jquery',
		is_production()
			? _s_revved_asset('js/vendor.min.js')
			: _s_asset('js/vendor.js'),
		array(),
		'',
		!$in_footer
	);

	wp_enqueue_script(
		'application',
		is_production()
			? _s_revved_asset('js/application.min.js')
			: _s_asset('js/application.js'),
		array('jquery'),
		'',
		$in_footer
	);
});


// Load HTML5 Blank conditional scripts
// conditional scripts from html5blank theme
// function html5blank_conditional_scripts()
// {
//     if (is_page('pagenamehere')) {
//         wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
//         wp_enqueue_script('scriptname'); // Enqueue it!
//     }
// }
