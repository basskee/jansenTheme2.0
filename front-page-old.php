<?php get_header(); ?> 
	
<div class="page-content">
	<div class="inner-content front-page-inner">

		<section>
		  <div class="flexslider">
			<ul class="slides">
				
				<?php
				query_posts(array('posts_per_page' => 3, 'category_name' => 'Featured'));
				if(have_posts()) : while(have_posts()) : the_post();
				?>
			
				  <li class="featured-post">
					<?php the_post_thumbnail('slider-image'); ?>
					<div class="caption">
						<a href="<?php the_permalink(); ?>" class="slider-title"><?php the_title();?></a>
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>" class="btn">Read More!</a>
					</div>

					
				  </li>
			  
				<?php
				    endwhile;
					endif;
					wp_reset_query();
				?>
			</ul>
		  </div>
		</section> <!-- End Slider -->

		<div class="featured">
			<div class="col-1-3">
				<div class="feature">
					<?php dynamic_sidebar('hw-1' ); ?>
				</div>
			</div>
			<div class="col-1-3">
				<div class="feature">
					<?php dynamic_sidebar('hw-2' ); ?>
				</div>
			</div>
			<div class="col-1-3">
				<div class="feature">
					<?php dynamic_sidebar('hw-3' ); ?>
				</div>
			</div>
		</div>
		
		<div class="blog">
			<div class="contentleft" id="frontpage-left">
				<div class="frontpage-title"><h1>Latest Posts</h1></div>
					<div class="latest-posts">
						<?php query_posts('posts_per_page=4' );
							while (have_posts()) : the_post();
						?>
							<div class="col-1-2">
								<div class="latest-post">
									In <?php the_category('&nbsp;/$nbsp;'); ?>
									<h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
									<div class="frontpage-thumbnail">
										<?php the_post_thumbnail('medium-thumbnail'); ?>
									</div>
									<?php the_excerpt(); ?>
									<div class="tags"><?php the_tags('Tags:', '&nbsp;/&nbsp;') ?></div>
								</div>
							</div>

					<?php endwhile; wp_reset_query(); ?>
					<!-- end of latest posts -->
					</div>
				<!-- end of content left -->
			</div>
			<div class="contentright">
				<?php get_sidebar(); ?>
			</div>
		</div>

		<div class="clearfix"></div>

<!-- end inner-content -->		
	</div>
<!-- end page content -->
</div>
<?php get_footer(); ?>