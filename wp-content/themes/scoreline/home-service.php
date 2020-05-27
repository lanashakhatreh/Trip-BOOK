<!-- our services -->
<?php $scorline_theme_options= scoreline_get_options(); ?>
<div class="container-fluid scoreline-services space">
<div class="container">
	<?php if($scorline_theme_options['home_service_heading'] !='') { ?> 
			<h1 class="scoreline_service_title"><?php echo esc_attr($scorline_theme_options['home_service_heading']); ?></h1>
	            <?php } 
	    
		    if($scorline_theme_options['service_desc'] !=='') { ?>
			<p class="scoreline_service_desc"><?php echo get_theme_mod('service_desc' , $scorline_theme_options['service_desc']); ?></p>
	         <?php } ?>
			
	<div class="col-md-12 scoreline-services-post ">
		<div class="scoreline_home_service">
		<?php 
			if($scorline_theme_options['ser_img_1']!='' || $scorline_theme_options['ser_img_2']!='' || 			$scorline_theme_options['ser_img_3']!=''){
			$args = array( 'post_type' => 'post', 'posts_per_page'=>-1, 'post_status'=>'publish','post__in' => array($scorline_theme_options['ser_img_3'], $scorline_theme_options['ser_img_2'], $scorline_theme_options['ser_img_1'] )); 
		$home_blog= new WP_Query( $args );
		if($home_blog->have_posts()){
		while($home_blog->have_posts()):
		$home_blog->the_post(); ?>
			<div class="col-md-4 col-sm-6 scoreline-services-text">
				<?php if(has_post_thumbnail()): ?>
						<div class="ser_img">
						<img src="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>" class="img-responsive" alt="<?php the_title(); ?>">
						</div>
						<?php endif; ?>
				<div class="col-md-12 tital">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>				
					<?php the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>" class="ser_btn"><?php esc_html_e('Continue','scoreline'); ?></a>
				</div>
			</div>
			<?php endwhile; 
		}
	} else{ ?>
		<div class="col-md-4 col-sm-6 scoreline-services-text">
			<div class="ser_img">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/head1.jpg" alt="img" class="img-responsive">
			</div>
			<div class="col-md-12">
				<a href="#"><h3><?php esc_html_e('Save Money','scoreline'); ?></h3></a>						
				<p><?php esc_html_e('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.','scoreline'); ?></p>
				<a href="#" class="ser_btn"><?php esc_html_e('Continue','scoreline'); ?></a>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 scoreline-services-text">
			<div class="ser_img">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/port.jpg" alt="img" class="img-responsive">
			</div>
			<div class="col-md-12">
				<a href="#"><h3><?php esc_html_e('Love Music','scoreline'); ?></h3></a>						
				<p><?php esc_html_e('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.','scoreline'); ?></p>
				<a href="#" class="ser_btn"><?php esc_html_e('Continue','scoreline'); ?></a>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 scoreline-services-text">
			<div class="ser_img">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/head3.jpg" alt="img" class="img-responsive">
			</div>
			<div class="col-md-12">
				<a href="#"><h3><?php esc_html_e('Wel Documented','scoreline'); ?></h3></a>						
				<p><?php esc_html_e('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.','scoreline'); ?></p>
				<a href="#" class="ser_btn"><?php esc_html_e('Continue','scoreline'); ?></a>
			</div>
		</div>
		<?php } ?>
	</div>
	</div>	
</div>
</div>
	<!-- our service-End-->