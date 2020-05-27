<?php get_header(); 
get_template_part('breadcrums'); ?>
<div class="container-fluid blogs space">
	<div class="container scoreline-blog-3 blog_gallery">
	<div class="col-md-8">	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>		
		<?php get_template_part('post','content'); 
		endwhile; 
		else : 
		get_template_part('nocontent');
		endif;
		scoreline_navigation_posts();
		comments_template( '', true ); ?>
	</div>
	<?php get_sidebar(); ?>	
	</div> 
</div>
<?php get_footer(); ?>