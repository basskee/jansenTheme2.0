<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/flexslider.css"/>
		<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->
		<script type="text/javascript" src="<?php bloginfo( 'template_url' );?>/js/jquery.flexslider.js" ></script>
		<meta charset="<?php bloginfo('charst'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale: 1.0">
		<title><?php bloginfo("name"); ?></title>

	</head>
	<body>

		<div class="container">
			 <header id="header" class="site-header">
			 	<h1><a href="<?php echo home_url(); ?>"><?php bloginfo("name" ); ?></a></h1>
			 	<div class="top-search">
			 		<?php get_search_form(); ?>
			 	</div>
			 	<div class="clearfix"></div>
			 </header><!-- /header -->
			 <nav class="main-nav">
			 	<?php wp_nav_menu(array("theme_location" => "main-menu") );?>
			 </nav>
	
