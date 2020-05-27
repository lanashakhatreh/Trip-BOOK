<?php $scorline_theme_options = scoreline_get_options(); ?>
<!-- Footer Widget Secton -->
<footer>
<div class="container-fluid scoreline-footer space">
	<div class="container">
			<?php 
			if ( is_active_sidebar( 'footer-widget-area' ) ){ 
				dynamic_sidebar( 'footer-widget-area' );
			} ?>		
    </div>			
</div>			

<div class="container-fluid footerweb">
	<div class="footer_area">
		<div class="container">
		    <div class="col-md-8 scoreline-copyryt">
			<p class="scoreline_footer_text">
			<?php if($scorline_theme_options['footer_customizations']) { echo esc_attr($scorline_theme_options['footer_customizations']); }
			if($scorline_theme_options['developed_by_text']) { echo "|" .esc_attr($scorline_theme_options['developed_by_text']); } ?>
			<a target="_blank" rel="nofollow" href="<?php if($scorline_theme_options['developed_by_link']) { echo esc_url($scorline_theme_options['developed_by_link']); } ?>"><?php if($scorline_theme_options['developed_by_weblizar_text']) { echo esc_attr($scorline_theme_options['developed_by_weblizar_text']); } ?></a>
			</p>
			</div>
			<?php if($scorline_theme_options['footer_section_social_media_enbled'] == 'on') { ?>
				<div class="col-md-4 scoreline-copyryt scoreline_social_media_footer">
					<ul class="social-icons">
					<?php if($scorline_theme_options['fb_link']!='') { ?>
						<li class="facebook"><a href="<?php echo esc_url($scorline_theme_options['fb_link']); ?>"><i class="fa fa-facebook"></i></a></li>
					<?php } if($scorline_theme_options['gplus']!='') { ?>
						<li class="googleplus"><a href="<?php echo esc_url($scorline_theme_options['gplus']); ?>"><i class="fa fa-google-plus"></i></a></li>
					<?php } if($scorline_theme_options['instagram_link']!='') { ?>
						<li class="instagram"><a href="<?php echo esc_url($scorline_theme_options['instagram_link']); ?>"><i class="fa fa-instagram"></i></a></li>
					<?php } if($scorline_theme_options['youtube_link']!='') { ?>
						<li class="youtube"><a href="<?php echo esc_url($scorline_theme_options['youtube_link']); ?>"><i class="fa fa-youtube"></i></a></li>
					<?php } if($scorline_theme_options['linkedin_link']!='') { ?>
						<li class="linkedin"><a href="<?php echo esc_url($scorline_theme_options['linkedin_link']) ; ?>"><i class="fa fa-linkedin"></i></a></li>
	                <?php } if($scorline_theme_options['pinterest_link']!='') { ?>
						<li class="pinterest"><a href="<?php echo esc_url($scorline_theme_options['pinterest_link']); ?>"><i class="fa fa-pinterest"></i></a></li>
	                <?php } ?>
					</ul>
				</div>	
			<?php } ?>
			</div>		
		</div>
	</div>
</footer>	
<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
<?php wp_footer(); ?>
</body>
</html>