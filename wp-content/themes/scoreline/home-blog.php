<!-- Blog-start -->
<?php $scorline_theme_options = scoreline_get_options(); ?>
<div class="container-fluid scoreline-blog space">
	<div class="container">
	<?php if($scorline_theme_options['blog_title'] !='') { ?>
		<h1 class="scoreline_blog_title"><?php echo esc_attr($scorline_theme_options['blog_title']); ?></h1>
	<?php }
			
		if($scorline_theme_options['blog_desc'] !=='') { ?>
			<p class="scoreline_blog_desc"><?php echo get_theme_mod('blog_desc' , $scorline_theme_options['blog_desc']); ?></p>
	         <?php } ?>	
			 
        <div class="row scoreline-blog-desc">
	        <?php if ( have_posts()) : 			
				$posts_count =wp_count_posts()->publish;
				$args = array( 'post_type' => 'post','posts_per_page' => $posts_count ,'ignore_sticky_posts' => 1);		
				$post_type_data = new WP_Query( $args );
				?>
			
<div class="slider-wrapper">
	<div class="swiper-container home_blog">
		<div class="swiper-wrapper">
	      <?php while($post_type_data->have_posts()):
			$post_type_data->the_post();  ?>	
		    <div class="swiper-slide">
		        <div class="col-md-12 scoreline-blog-text">					
					<div class="latest-post">
					<?php if(has_post_thumbnail()): ?>
							 <?php $data= array('class' =>'img-responsive'); 
								   the_post_thumbnail('scoreline-post-thumb', $data); ?>
								   <a href="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>"></a>
							<?php endif; ?>
						<div class="post-body">
							<h3 class="post-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>
							<div class="post-tag">
								<?php if(get_the_tag_list() !='') { ?>
									<?php the_tags( __('<span>Tags :</span> ','scoreline'), ' ', '<br />'); ?>
								<?php } ?>	
							</div>
							<div class="post-text">
								<?php the_excerpt(); ?>
							</div>
						</div>	
						<div class="post-bottom">
							<div class="pull-left">
							<i class="fa fa-calendar"></i>
								<?php if(get_the_date() !='') { ?>
									<?php echo get_the_date();?>
								<?php } ?>
							</div>
							<a class="pull-right" href="<?php the_permalink(); ?>"><?php esc_html_e('Continue', 'scoreline'); ?><i class="fa fa-angle-right">&nbsp;</i></a>
						</div>
					</div>
		        </div>
		    </div>
			<?php endwhile; ?> 
        </div>
    </div>
</div>
        <?php endif; ?>	 		
        </div>
	</div>
</div>

	<!-- Blog-end -->