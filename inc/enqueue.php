<?php

/*
@package jansentheme

	====================================
	ADMIN ENQUEUE FUNCTIONS
	====================================
 */

function jansen_load_admin_scripts( $hook ){

	if ('toplevel_page_admin_jansen' == $hook ){

		wp_register_style( 'jansen_admin', get_template_directory_uri() . '/css/jansen-admin.css', array(), '1.0.0', 'all' );
		wp_enqueue_style( 'jansen_admin' );

		wp_enqueue_media();

		wp_register_script('jansen-admin-script', get_template_directory_uri() . '/js/jansen-admin.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'jansen-admin-script' );

	}else if ( 'jansen_page_admin_jansen_css' == $hook ){

		wp_enqueue_style( 'ace', get_template_directory_uri() . '/css/jansen-ace.css', array(), '1.0.0', 'all');

		wp_enqueue_script( 'ace', get_template_directory_uri() . '/js/ace/ace.js', array('jquery'), '1.2.3', true );
		wp_enqueue_script( 'ace_mode_js', get_template_directory_uri() . '/js/ace/mode-css.js', array( 'ace' ), '1.0.0', true );
		wp_enqueue_script('jansen-custom-css-script', get_template_directory_uri() . '/js/jansen-custom-css.js', array('jquery'), '1.0.0', true );

	}else {return;}
}
add_action('admin_enqueue_scripts', 'jansen_load_admin_scripts');


/*
	====================================
	FRONT-END ENQUEUE FUNCTIONS
	====================================
*/

function jansen_load_scripts(){

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.0.0', 'all');
	wp_enqueue_style( 'jansen', get_template_directory_uri() . '/css/jansen.css', array(), '1.0.0', 'all');

	wp_deregister_script( 'jquery');
	wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-1.12.3.min.js', false, '1.12.3', true );
	wp_enqueue_script('jquery' );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.0.0', 'all');

}
add_action( 'wp_enqueue_scripts', 'jansen_load_scripts' );