<?php 

/*
@package jansentheme

	====================================
	ADMIN PAGE
	====================================
 */
 
function jansen_add_admin_page(){
	//Generate Jansen Admin Page
 	add_menu_page( 'Jansen Theme Options', 'Jansen', 'manage_options', 'admin_jansen', 'jansen_theme_create_page', 'dashicons-hammer', 110 );

 	//Generate Jansen Admin Sub Pages
 	add_submenu_page( 'admin_jansen', 'Jansen Sidebar Options', 'Sidebar', 'manage_options', 'admin_jansen','jansen_theme_create_page');
 	add_submenu_page('admin_jansen', 'Jansen Theme Options', 'Theme Options', 'manage_options', 'admin_jansen_theme', 'jansen_theme_support_page');
 	add_submenu_page('admin_jansen','Jansen Contact Form','Contact Form','manage_options','admin_jansen_theme_contact','jansen_contact_form_page');
 	add_submenu_page('admin_jansen','Jansen CSS Options','Custom CSS','manage_options','admin_jansen_css','jansen_theme_settings_page');


 //ACTIVATE CUSTOM SETTINGS
 add_action( 'admin_init', 'jansen_custom_settings' );
 }
 add_action( 'admin_menu', 'jansen_add_admin_page' );

 function jansen_custom_settings() {
 	//Sidebar Options
 	register_setting( 'jansen-settings-group', 'profile_picture');
 	register_setting( 'jansen-settings-group', 'first_name');
 	register_setting( 'jansen-settings-group', 'last_name');
 	register_setting( 'jansen-settings-group', 'user_description');
 	register_setting( 'jansen-settings-group', 'twitter_handle', 'jansen_sanitize_twitter_handle');
 	register_setting( 'jansen-settings-group', 'facebook_handle');
 	register_setting( 'jansen-settings-group', 'gplus_handle');

 	add_settings_section( 'jansen-sidebar-options', 'Sidebar Options', 'jansen_sidebar_options', 'admin_jansen' );

 	add_settings_field( 'sidebar-profile-picture', 'Profile Picture', 'jansen_sidebar_profile_picture', 'admin_jansen', 'jansen-sidebar-options' );
 	add_settings_field( 'sidebar-name', 'Full Name', 'jansen_sidebar_name', 'admin_jansen', 'jansen-sidebar-options' );
 	add_settings_field( 'sidebar-description', 'Description', 'jansen_sidebar_description', 'admin_jansen', 'jansen-sidebar-options' );
 	add_settings_field('sidebar-twitter', 'Twitter handle', 'jansen_sidebar_twitter', 'admin_jansen', 'jansen-sidebar-options' );
 	add_settings_field('sidebar-facebook', 'Facebook handle', 'jansen_sidebar_facebook', 'admin_jansen', 'jansen-sidebar-options' );
 	add_settings_field('sidebar-gplus', 'Google+ handle', 'jansen_sidebar_gplus', 'admin_jansen', 'jansen-sidebar-options' );

 	//Theme Support Options
 	register_setting('jansen-theme-support', 'post_formats' );
 	register_setting('jansen-theme-support', 'custom_header' );
 	register_setting('jansen-theme-support', 'custom_background' );

 	add_settings_section('jansen-theme-options', 'Theme Options', 'jansen_theme_options', 'admin_jansen_theme' );

 	add_settings_field('post-formats', 'Post Formats', 'jansen_post_formats', 'admin_jansen_theme', 'jansen-theme-options' );
 	add_settings_field('custom-header', 'Custom Header', 'jansen_custom_header', 'admin_jansen_theme', 'jansen-theme-options' );
 	add_settings_field('custom-background', 'Custom Background', 'jansen_custom_background', 'admin_jansen_theme', 'jansen-theme-options' );

 	//Contact Form Options
 	register_setting('jansen-contact-options', 'activate_contact' );

 	add_settings_section('jansen-contact-section', 'Contact Form', 'jansen_contact_section', 'admin_jansen_theme_contact');
 	add_settings_field('activate-form', 'Activate Contact Form', 'jansen_activate_contact', 'admin_jansen_theme_contact', 'jansen-contact-section');


 	//Custom CSS Options
 	register_setting('jansen-custom-css-options', 'jansen_css', 'jansen_sanitize_custom_css' );
 	add_settings_section('jansen-custom-css-section', 'Custom CSS', 'jansen_custom_css_section_callback','admin_jansen_css' );

 	add_settings_field( 'custom-css', 'Insert your Custom CSS', 'jansen_custom_css_callback','admin_jansen_css', 'jansen-custom-css-section' );
}

function jansen_custom_css_section_callback(){
	echo 'Customize Jansen Theme with your own CSS';
}

function jansen_custom_css_callback(){
	$css = get_option('jansen_css');
	$css = ( empty($css) ? '/* Jansen Theme Custom CSS */' : $css );
	echo '<div id="customCss">'.$css.'</div><textarea id="jansen_css" name="jansen_css" style="display:none; visibility:hidden">'.$css.'</textarea>';
}




function jansen_theme_options(){
	echo 'Activate and Deactivate Theme Support Options';
}
function jansen_contact_section(){
	echo 'Activate and Deactivate the built in Contact Form';
}

function jansen_activate_contact(){
	$options = get_option('activate_contact');
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" name="activate_contact" value="1" '.$checked.' /></label>';
}

function jansen_post_formats(){
	$options = get_option('post_formats');
	$formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
	$output = '';
	foreach ($formats as $format) {
		$checked = ( @$options[$format] == 1 ? 'checked' : '' );
		$output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' /> '.$format.'</label></br>';
	}
	echo $output;
}

function jansen_custom_header(){
	$options = get_option('custom_header');
	$output = '';
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo'<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' /> Activate the Custom Header</label>';
}

function jansen_custom_background(){
	$options = get_option('custom_background');
	$output = '';
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo'<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' /> Activate the Custom Background</label>';
}

//Sidebar Options Functions
function jansen_sidebar_options(){
	echo 'Customize your Sidebar Information';
}
function jansen_sidebar_profile_picture(){
	$profilePicture = esc_attr( get_option('profile_picture') );
	if(empty($profilePicture)){
		echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="'.$profilePicture.'" />';

	} else {
		echo '<input type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="'.$profilePicture.'" /><input type="button" class="button button-secondary" value="Remove" id="remove-picture">';
	}
	
}

function jansen_sidebar_name(){
	$firstName = esc_attr( get_option('first_name') );
	$lastName = esc_attr( get_option('last_name') );
	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" /> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
}
function jansen_sidebar_description(){
	$description = esc_attr( get_option('user_description') );
	echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Description" /><p class="description">Write something smart.</p>';
}
function jansen_sidebar_twitter(){
	$twitter = esc_attr( get_option('twitter_handle') );
	echo '<input type="text" name="twitter_handle" value="'.$twitter.'" placeholder="Twitter Handle" /><p class="description">Input your Twitter Username without the @ character.</p>';
}
function jansen_sidebar_facebook(){
	$facbook = esc_attr( get_option('facebook_handle') );
	echo '<input type="text" name="facebook_handle" value="'.$facebook.'" placeholder="Facebook Handle" />';
}
function jansen_sidebar_gplus(){
	$gplus = esc_attr( get_option('gplus_handle') );
	echo '<input type="text" name="gplus_handle" value="'.$gplus.'" placeholder="Google+ Handle" />';
}

//Santization Settings

function jansen_sanitize_twitter_handle( $input ){
	//Converts characters and strips UTF-8
	$output = sanitize_text_field( $input );
	$output = str_replace('@', '', $output);
	return $output;
}

function jansen_sanitize_custom_css( $input ){
	$output = esc_textarea( $input );
	return $output;
}
 
// Template submenu Functions
function jansen_theme_create_page() {
	//generation of admin page
	require_once(get_template_directory() . '/inc/templates/jansen-admin.php' );
}
function jansen_theme_support_page(){
	require_once(get_template_directory() . '/inc/templates/jansen-theme-support.php');
}

function jansen_contact_form_page(){
	require_once(get_template_directory() . '/inc/templates/jansen-contact-form.php');
}

function jansen_theme_settings_page() {
	require_once(get_template_directory() . '/inc/templates/jansen-custom-css.php');

}









