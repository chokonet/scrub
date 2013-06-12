<?php


	define( 'JSPATH', get_template_directory_uri() . '/js/' );

	define( 'CSSPATH', get_template_directory_uri() . '/css/' );

	define( 'THEMEPATH', get_template_directory_uri() . '/' );



// FRONT END SCRIPTS AND STYLES //////////////////////////////////////////////////////



	add_action( 'wp_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'plugins', JSPATH.'plugins.js', array('jquery'), false, true );
		wp_enqueue_script( 'functions', JSPATH.'functions.js', array('jquery','plugins'), '1.0', true );

		// localize scripts
		wp_localize_script( 'functions', 'ajax_url',  get_bloginfo('wpurl').'/wp-admin/admin-ajax.php' );

		// styles
		wp_register_style( 'styles', get_stylesheet_uri() );

	});



// ADMIN SCRIPTS AND STYLES //////////////////////////////////////////////////////////



	add_action( 'admin_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'jquery-ui-datepicker' ); // Default WordPress datepicker
		wp_enqueue_script( 'modernizr', THEMEPATH.'admin/js/modernizr.min.js', false, '2.6.2', true );
		wp_enqueue_script( 'functions-admin', THEMEPATH.'admin/js/functions-admin.js', array('jquery','modernizr'), '1.0', true );

		// styles
		wp_register_style( 'jquery-ui-css', THEMEPATH.'admin/css/jquery-ui.css' );
		wp_register_style( 'styles', get_stylesheet_uri() );

	});



// REMOVE ADMIN BAR FOR NON ADMINS ///////////////////////////////////////////////////



	add_filter( 'show_admin_bar', function($content) {
		return ( current_user_can("administrator") ) ? $content : false;
	});



// CAMBIAR EL CONTENIDO DEL FOOTER EN EL DASHBOARD ///////////////////////////////////



	add_filter( 'admin_footer_text', function() {
		echo 'Creado por <a href="http://hacemoscodigo.com">Los Maquiladores</a>. ';
		echo 'Powered by <a href="http://www.wordpress.org">WordPress</a>';
	});