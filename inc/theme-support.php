<?php 

/*
@package jansentheme

====================================
THEME SUPPORT OPTIONS
====================================
*/

//ADDING POST FORMATS TO POSTS 
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

//ACTIVATE NAVIGATION MENU OPTION 

function jansen_register_nav_menu(){
	register_nav_menu( 'primary' , 'Header Navigation Menu' );
	register_nav_menu( 'footer-menu', 'Footer Menu' );
}
add_action( 'after_setup_theme', 'jansen_register_nav_menu');

//ENABLE MENU OPTIONS
add_theme_support("menus");

//ENABLE IMAGE SUPPORT
add_theme_support('post-thumbnails');
add_image_size('small-thumbnail', 180, 120, true);
add_image_size('banner-image', 1002, 210, true);
add_image_size('medium-thumbnail', 267, 200, true);
add_image_size('slider-image', 1000, 350, true);

/*
====================================
BLOG LOOP CUSTOM FUNCTION
====================================
*/

function jansen_posted_meta(){
	$posted_on = human_time_diff( get_the_time('U'), current_time('timestamp') );

	$categories = get_the_category();
	$separator = ', ';
	$output = '';
	$i = 1;

	if ( !empty($categories) ):
		foreach ( $categories as $category ):

			if( $i >1 ): $output .= $separator; endif;

			$output .= '<a href="' .esc_url(get_category_link( $category->term_id) ) . '" alt="' . esc_attr( 'View All Posts in%s', $category->name) .'">' . esc_html( $category->name) .'</a>';
			$i++;
		endforeach;
		endif;

	return '<span class="posted-on">Posted <a href="'. esc_url( get_permalink() ) .'">' .$posted_on. '</a> ago</span> / <span class="posted-in">' . $output . '</span>';
}

function jansen_posted_footer(){
	return 'tags list and comment link';

}












