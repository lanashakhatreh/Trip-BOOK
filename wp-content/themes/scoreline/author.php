<?php get_header(); ?>
<div class="cover">	
	<div class="container-fluid space hd-cover">
	  <div class="container">
		<div class="scoreline-portfolio-title">
		<?php if(have_posts()) :?>
			<h1><?php /* translators: %s: author name */
			printf( esc_html__( 'Author Archives: %s', 'scoreline' ), '<span class="vcard">'. get_the_author() .'</span>' ) ; ?>
			</h1>
		<?php endif; ?>
		</div>
		</div>
	</div>	
</div>
<div class="container-fluid blogs space">	
	<div class="container scoreline-blog-3 blog_gallery">
	<div class="col-md-8">
	<?php if ( have_posts()): while ( have_posts() ): the_post();
	get_template_part('post','content'); ?>
	<?php endwhile; 
	endif; 
	scoreline_navigation();
	?>
	</div>		
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>	