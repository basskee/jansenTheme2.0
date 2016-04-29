<?php 

/*
@package jansentheme

	====================================
	THEME SUPPORT OPTIONS
	====================================
 */

//Adding Post Formats to the Posts 
$options = get_option('post_formats');
$formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
$output = '';
foreach ($formats as $format) {
	$output[] = ( @$options[$format] == 1 ? $format : '' );
	}
if( !empty( $options ) ){
	add_theme_support( 'post-formats', $output );
}

$header = get_option('custom_header');
if(@$header ==1 ){
	add_theme_support('custom-header' );
}

$background = get_option('custom_background');
if(@$background ==1 ){
	add_theme_support('custom-background' );
}

/*Activate Navigation Menu Option*/

function jansen_register_nav_menu(){
	register_nav_menu( 'main-menu' , 'Header Navigation Menu' );
	register_nav_menu( 'footer-menu', 'Footer Menu' );
}
add_action( 'after_setup_theme', 'jansen_register_nav_menu');