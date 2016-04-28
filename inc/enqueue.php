<?php

/*
@package jansen

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


