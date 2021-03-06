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
	//Adds comments and tags to bottom of the blog post
	$comments_num = get_comments_number();
	if( comments_open() ){
		//get comments link
		if($comments_num ==0 ){
			$comments = __( 'No Comments' );	
		}elseif ( $comments_num > 1 ){
			$comments = $comments_num . __(' Comments');
		}else{
			$comments = __('1 Comment');
		}
		$comments = '<a class="comments-link" href="' . get_comments_link() .'">'. $comments . ' <span class="sunset-icon sunset-comment"></span></a>';
	}else{
		$comments = __( 'Comments are closed' );
	}
	// Adds HTML to tags and comments 
	return '<div class="post-footer-container"><div class="row"><div class="col-xs-12 col-sm-6">'. get_the_tag_list( '<div class="tags-list"><span class="sunset-icon sunset-tag"></span>', ' ', '</div>') .'</div><div class="col-xs-12 col-sm-6 text-right">'. $comments .'</div></div></div>';

}

function jansen_get_attachment(){
	$output = '';
	if( has_post_thumbnail() ):
		$output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
	else:
		$attachments = get_posts( array(
			'post_type' => 'attachment',
			'posts_per_page' => 1,
			'post_parent' => get_the_ID()
		) );
		if( $attachments ):
			foreach ( $attachments as $attachment ):
				$output = wp_get_attachment_url( $attachment->ID );
			endforeach;
		endif;
		wp_reset_postdata();
	endif;
	return $output;
}











