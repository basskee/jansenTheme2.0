<h1>Jansen Theme Support</h1>
<?php settings_errors(); ?>
<?php 
	// $profilePicture = esc_attr( get_option('profile_picture') );

 ?>



<form method="post" action="options.php" class="jansen-general-form">
	<?php settings_fields( 'jansen-theme-support'); ?>
	<?php do_settings_sections('admin_jansen_theme'); ?>
	<?php submit_button(); ?>
</form> 