<div class="site-footer">
	<p class="copyrights">
		Jansen <span style="font-size:15px; font-family: sans-serif;">&copy;</span>
	</p>
	<div class="footer-menu">
		<?php wp_nav_menu(array("theme_location" => "footer-menu") );?>
	</div>
</div>

</div><!--  End of Container -->


<script type="text/javascript">

	// Can also be used with $(document).ready()
	jQuery(window).load(function() {
	  jQuery('.flexslider').flexslider({
		animation: "slide"
	  });
	});
</script>

<?php wp_footer(); ?>
</body>
</html>