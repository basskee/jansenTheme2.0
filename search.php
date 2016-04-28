<?php get_header(); ?> 
	
<div class="page-content">
	<div class="inner-content">
		<div class="page-title">
			<h1>Search Results for: <i><?php the_search_query(); ?></i></h1>
		</div>
		<div class="blog">

			<?php if( have_posts() ) : while(have_posts() ) : the_post(); ?>
				<div class="post <?php if (has_post_thumbnail()) { ?>
					has-thumbnail
				<?php } ?>" >

				<div class="post-thumbnail">
					<?php the_post_thumbnail('small-thumbnail') ?>
				</div>

				<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="author">
					Posted by
					<a href="<?php echo get_author_posts_url(get_the_author_meta( "ID" )); ?>">
						<?php the_author() ?>
					</a>
					on the <?php the_time("F j, Y"); ?></div>
				
				<p><?php the_excerpt(); ?></p>
				<div class="btn"><a href="<?php the_permalink(); ?>">Read More</a></div>
			</div>
			<?php endwhile; else: ?>
				<p style="margin-top: 20px;">
				No posts match your seach. Please try again
				</p>
			<?php endif; ?>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<?php get_footer(); ?>