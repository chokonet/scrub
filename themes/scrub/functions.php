<?php

	// path a los directorios de javascript y css
	define( 'JSPATH', get_template_directory_uri() . '/js/' );
	define( 'CSSPATH', get_template_directory_uri() . '/css/' );

	// front end styles and scripts
	add_action( 'wp_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script('modernizr', JSPATH.'modernizr.min.js', '', false, true );
		wp_enqueue_script('plugins', JSPATH.'plugins.js', array('jquery'), false, true );
		wp_enqueue_script('functions', JSPATH.'functions.js', array('plugins', 'modernizr'), false, true );
		wp_enqueue_script('jquery-ui-datepicker'); // Default WordPress datepicker
		wp_localize_script('functions', 'ajax_url',  get_bloginfo('wpurl').'/wp-admin/admin-ajax.php');

		// styles
		wp_enqueue_style('normalize', CSSPATH.'normalize.css' );
		wp_enqueue_style('jquery-ui-datepicker-css', CSSPATH.'jquery-ui.css' );
		wp_enqueue_style('style', get_stylesheet_uri(), array('normalize') );

	});