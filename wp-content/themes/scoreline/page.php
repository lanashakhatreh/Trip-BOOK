<?php get_header(); 
get_template_part('breadcrums'); ?>
<div class="container-fluid blogs space">
	<div class="container scoreline-blog-3 blog_gallery">
	<div class="col-md-8">
		<div <?php post_class();?>>		
			<?php if ( have_posts()): 
			while ( have_posts() ): the_post(); ?>
				<?php get_template_part('post','content'); ?>
			<?php endwhile; 
				scoreline_link_pages();
			else:
		     	get_template_part('nocontent');
           	endif; ?>
		</div>
	</div>
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>