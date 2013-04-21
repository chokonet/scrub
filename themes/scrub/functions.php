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


	require_once 'vendor/autoload.php';

	define( 'TEMPLATES_PATH', get_template_directory() . '/templates/' );

	class Templating_Engine {

		public $loader;
		public  $twig;

		public function __construct(){
			$this->loader = new Twig_Loader_Filesystem( TEMPLATES_PATH );
			$this->twig   = new Twig_Environment($this->loader, array(
				//'cache' => TEMPLATES_PATH . 'compilation_cache',
				'cache' => false,
				'debug' => true
			));
		}

		public function renderTemplate($template, $array){
			try {
				$this->twig->parse($this->twig->tokenize($template));
				// the $template is valid
				echo $this->twig->render( $template, $array );
			} catch (Twig_Error_Syntax $e) {
				// $template contains one or more syntax errors
			}
		}
	}

	$wptemplate = new Templating_Engine();

	function mq_get_posts(){
		global $wpdb, $wptemplate;
		//$template = new Templating_Engine();
		$results = $wpdb->get_results("SELECT * FROM wp_posts", ARRAY_A);
		foreach ($results as $post) {
			$wptemplate->renderTemplate( 'navigation.php', $post );
		}
	}