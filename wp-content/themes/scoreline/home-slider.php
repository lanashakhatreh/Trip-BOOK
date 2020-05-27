<?php $scorline_theme_options = scoreline_get_options(); ?>
<?php if($scorline_theme_options['scoreline_sliders']=='1'){ ?>
<div class="slider-wrapper">
	<div class="swiper-container home_slider">
		<div class="swiper-wrapper">
		<?php 
			if($scorline_theme_options['slider_image_1']!='' || $scorline_theme_options['slider_image_2']!='' || 			$scorline_theme_options['slider_image_3']!='' || $scorline_theme_options['slider_image_4']!=''){
			$args = array( 'post_type' => 'post', 'posts_per_page'=>-1, 'post_status'=>'publish','post__in' => array($scorline_theme_options['slider_image_4'], $scorline_theme_options['slider_image_3'], $scorline_theme_options['slider_image_2'],$scorline_theme_options['slider_image_1'] )); 
			$home_slider = new WP_Query( $args );
			if ( $home_slider->have_posts() ):
			while ( $home_slider->have_posts() ):
			$home_slider->the_post();
			if(has_post_thumbnail() ): ?>
			<div class="swiper-slide">
				<img src="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>" class="img-responsive" alt="<?php echo the_title(); ?>"> 
				<div class="carousel-caption">
				<h1 class="animation animated-item-1"><?php the_title(); ?></h1>			
				<h2 class="animation animated-item-2"><?php the_excerpt(); ?></h2>
				<a class="btn hvr-grow-shadow animation animated-item-3" href="<?php esc_url(the_permalink()); ?>" role="button"><?php esc_html_e('Read More', 'scoreline'); ?></a>
				</div>
			</div>
			<?php endif; endwhile; 
			endif;
			} else { ?>
				<div class="swiper-slide">
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/head3.jpg" class="img-responsive" alt="img1"/>
					<div class="carousel-caption">
						<h1 class="wow zoomInDown"><?php esc_html_e('Responsive & Clean Layout','scoreline'); ?></h1>
						<h2 class="wow zoomInUp"><?php esc_html_e('Lorem ipsum dolor sit amet consectetur.','scoreline'); ?></h2>
						<a role="button" href="#" class="btn btn-danger hvr-grow-shadow wow zoomInUp"><?php esc_html_e('Read More','scoreline'); ?></a>
					</div>
				</div>
				<div class="swiper-slide">
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/head2.jpg" class="img-responsive" alt="img1"/>
					<div class="carousel-caption">
						<h1 class="wow zoomInDown"><?php esc_html_e('Take a Tour with Scoreline','scoreline'); ?></h1>
						<h2 class="wow zoomInUp"><?php esc_html_e('Lorem ipsum dolor sit amet consectetur.','scoreline'); ?></h2>
						<a role="button" href="#" class="btn btn-danger hvr-grow-shadow wow zoomInUp"><?php esc_html_e('Read More','scoreline'); ?></a>
					</div>
				</div>
				<div class="swiper-slide">
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/head4.jpg" class="img-responsive" alt="img1"/>
					<div class="carousel-caption">
						<h1 class="wow zoomInDown"><?php esc_html_e('IMPOSSIBLE PROJECTS EVERYDAY','scoreline'); ?></h1>
						<h2 class="wow zoomInUp"><?php esc_html_e('Lorem ipsum dolor sit amet consectetur.','scoreline'); ?></h2>
						<a role="button" href="#" class="btn btn-danger hvr-grow-shadow wow zoomInUp"><?php esc_html_e('Read More','scoreline'); ?></a>
					</div>
				</div>
				<div class="swiper-slide">
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/head1.jpg" class="img-responsive" alt="img1"/>
					<div class="carousel-caption">
						<h1 class="wow zoomInDown"><?php esc_html_e('IMPOSSIBLE PROJECTS EVERYDAY','scoreline'); ?></h1>
						<h2 class="wow zoomInUp"><?php esc_html_e('Lorem ipsum dolor sit amet consectetur.','scoreline'); ?></h2>
						<a role="button" href="#" class="btn btn-danger hvr-grow-shadow wow zoomInUp"><?php esc_html_e('Read More','scoreline'); ?></a>
					</div>
				</div>
		<?php } ?>
	    </div>
		<div class="swiper-button-prev swiper-button-white swiper-button-prev1"></div>
			<div class="swiper-button-next swiper-button-white swiper-button-next1"></div>
	</div>
</div>
<?php } else { ?>
<div class="slider-wrapper">
	<div class="swiper-container home_slider2">
		<div class="swiper-wrapper">
		<?php 
			if($scorline_theme_options['slider_image_1']!='' || $scorline_theme_options['slider_image_2']!='' || 			$scorline_theme_options['slider_image_3']!='' || $scorline_theme_options['slider_image_4']!=''){
			$args = array( 'post_type' => 'post', 'posts_per_page'=>-1, 'post_status'=>'publish','post__in' => array($scorline_theme_options['slider_image_4'], $scorline_theme_options['slider_image_3'], $scorline_theme_options['slider_image_2'],$scorline_theme_options['slider_image_1'] )); 
			$home_slider = new WP_Query( $args );
			if ( $home_slider->have_posts() ):
			while ( $home_slider->have_posts() ):
			$home_slider->the_post();
			if(has_post_thumbnail() ): ?>
			<div class="swiper-slide">
				<img src="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>" class="img-responsive" alt="<?php echo the_title(); ?>"> 
				<div class="carousel-caption">
				<h1 class="animation animated-item-1"><?php the_title(); ?></h1>			
				<h2 class="animation animated-item-2"><?php the_excerpt(); ?></h2>
				<a class="btn hvr-grow-shadow animation animated-item-3" href="<?php esc_url(the_permalink()); ?>" role="button"><?php esc_html_e('Read More', 'scoreline'); ?></a>
				</div>
			</div>
			<?php endif; endwhile; 
			endif;
			} else { ?>
				<div class="swiper-slide">
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/head3.jpg" class="img-responsive" alt="img1"/>
					<div class="carousel-caption">
						<h1 class="wow zoomInDown"><?php esc_html_e('Responsive & Clean Layout','scoreline'); ?></h1>
						<h2 class="wow zoomInUp"><?php esc_html_e('Lorem ipsum dolor sit amet consectetur.','scoreline'); ?></h2>
						<a role="button" href="#" class="btn btn-danger hvr-grow-shadow wow zoomInUp"><?php esc_html_e('Read More','scoreline'); ?></a>
					</div>
				</div>
				<div class="swiper-slide">
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/head2.jpg" class="img-responsive" alt="img1"/>
					<div class="carousel-caption">
						<h1 class="wow zoomInDown"><?php esc_html_e('Take a Tour with Scoreline','scoreline'); ?></h1>
						<h2 class="wow zoomInUp"><?php esc_html_e('Lorem ipsum dolor sit amet consectetur.','scoreline'); ?></h2>
						<a role="button" href="#" class="btn btn-danger hvr-grow-shadow wow zoomInUp"><?php esc_html_e('Read More','scoreline'); ?></a>
					</div>
				</div>
				<div class="swiper-slide">
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/head4.jpg" class="img-responsive" alt="img1"/>
					<div class="carousel-caption">
						<h1 class="wow zoomInDown"><?php esc_html_e('IMPOSSIBLE PROJECTS EVERYDAY','scoreline'); ?></h1>
						<h2 class="wow zoomInUp"><?php esc_html_e('Lorem ipsum dolor sit amet consectetur.','scoreline'); ?></h2>
						<a role="button" href="#" class="btn btn-danger hvr-grow-shadow wow zoomInUp"><?php esc_html_e('Read More','scoreline'); ?></a>
					</div>
				</div>
				<div class="swiper-slide">
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/head1.jpg" class="img-responsive" alt="img1"/>
					<div class="carousel-caption">
						<h1 class="wow zoomInDown"><?php esc_html_e('IMPOSSIBLE PROJECTS EVERYDAY','scoreline'); ?></h1>
						<h2 class="wow zoomInUp"><?php esc_html_e('Lorem ipsum dolor sit amet consectetur.','scoreline'); ?></h2>
						<a role="button" href="#" class="btn btn-danger hvr-grow-shadow wow zoomInUp"><?php esc_html_e('Read More','scoreline'); ?></a>
					</div>
				</div>
		<?php } ?>
	    </div>
		<div class="swiper-button-prev swiper-button-white swiper-button-prev1"></div>
			<div class="swiper-button-next swiper-button-white swiper-button-next1"></div>
	</div>
	
</div>
<?php } ?>