<?php get_header(); ?>
<div class="cover">	
	<div class="container-fluid space hd-cover">
		<div class="container">
		<div class="scoreline-portfolio-title">
		<?php if(have_posts()) :?>
			<h1><?php /* translators: %s: search item */
			printf( esc_html__( 'Search Results for: %s', 'scoreline' ), '<span>' . get_search_query() . '</span>'  ); ?>
			</h1>
		<?php endif; ?>
		</div>
		</div>
	</div>	
</div>
<div class="container-fluid blogs space">	
	<div class="container scoreline-blog-3 blog_gallery">
	<div class="col-md-8">
	<?php 
	if ( have_posts()): 
	while ( have_posts() ): the_post();
	get_template_part('post','content'); ?>	
	<?php endwhile;
	scoreline_navigation();
	else :
	get_template_part('nocontent');
	endif; ?>	 
	</div>	
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>