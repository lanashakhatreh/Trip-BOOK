<?php get_header(); 
get_template_part('breadcrums'); ?>
<div class="container-fluid blogs space">
	<div class="container scoreline-blog-3 blog_gallery">
	<div class="col-md-8">
	<?php 
	if ( have_posts()): 
	while ( have_posts() ): the_post();
	get_template_part('post','content'); ?>	
	<?php endwhile; 
	endif; 
	scoreline_navigation(); ?>
	</div>	
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>