<?php 

//ADDING Templates in INC FOLDER
require get_template_directory() . '/inc/cleanup.php';
require get_template_directory() . '/inc/function-admin.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/theme-support.php';
require get_template_directory() . '/inc/custom-post-type.php';
require get_template_directory() . '/inc/walker.php';



//ADDING COMMENTS
if( get_option('thread_comments') ){
	wp_enqueue_script('comment-reply');
}


//REGISTER SIDEBAR
register_sidebar(array(
	'id' => 'right-sidebar',
	'name' => 'Right Sidebar',
	'before_widget' => '<div class="the-widget">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
	));
//REGISTER HOME WIDGET 1
register_sidebar(array(
	'id' => 'hw-1',
	'name' => 'Home Widget 1',
	'before_widget' => '<div class="home-widget">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
	));
//REGISTER HOME WIDGET 2
register_sidebar(array(
	'id' => 'hw-2',
	'name' => 'Home Widget 2',
	'before_widget' => '<div class="home-widget">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
	));
//REGISTER HOME WIDGET 3
register_sidebar(array(
	'id' => 'hw-3',
	'name' => 'Home Widget 3',
	'before_widget' => '<div class="home-widget">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
	));

//CUSTOM EXCERPT LENGTH
function custom_excerpt_length(){
	return 25;
}
add_filter('excerpt_length', 'custom_excerpt_length');

function the_comments($comment, $args, $depth){
	$GLOBAL['comment'] = $comment;

?>
<li <?php comment_class(); ?> >
	<div id="comment-<?php comment_ID(); ?>">
		<header class="comment-header">
			<?php echo get_avatar($comment,$size='48'); ?>

			<?php printf(_('<cite class="fn">%s</cite>'),get_comment_author_link()); ?>
			<div class="comment-meta commentmetadata">
				on <?php comment_date(); ?> at <?php comment_time(); ?>
				<?php edit_comment_link(_('(Edit)'),' ','') ?>
			</div>
		</header>
		
		<?php if ($comment->comment_approved == '0') : ?>
			<div class="awaiting-moderation">Your comment is awaiting moderation.</div>
		<?php endif; ?>

		<?php comment_text() ?>
		
		<div class="reply">
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</div>
	</div>

<?php }

