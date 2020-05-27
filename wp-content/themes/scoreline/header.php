<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">	
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php $scorline_theme_options = scoreline_get_options(); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="wrapper">
		<div class="row scoreline-header" <?php if ( has_header_image() ) { ?> style='background-image: url("<?php header_image(); ?>")' <?php  } ?>>
			<div class="container">
				<div class="col-sm-6 header">
					<a href="<?php echo esc_url(home_url( '/' )); ?>">

				  <?php $site_logo_id = get_theme_mod('custom_logo');
						$site_logo_details = wp_get_attachment_image_src( $site_logo_id , 'full');
						$site_logo = $site_logo_details[0];
				  if($site_logo!=''){ ?>
				 <span class="site-custom_logo"></span>
				 <img src="<?php echo esc_attr($site_logo); ?>" />
				 <?php }else{ ?> <h1 class="site-title"><?php echo esc_html(get_bloginfo('name')); ?></h1><?php } ?></a>
				</div>
				
				<?php if($scorline_theme_options['header_social_media_in_enabled']=='on') { ?>
				<div class="col-sm-6 header-social">
				<?php if($scorline_theme_options['email_id'] || $scorline_theme_options['phone_no'] !='') { ?>
				  <span class="scoreline_email_id"><?php if($scorline_theme_options['email_id'] !='') { ?>
				  <a href="mailto:<?php echo esc_url($scorline_theme_options['email_id']); ?>"><i class="fa fa-envelope icon"></i> <?php echo esc_attr($scorline_theme_options['email_id']); ?></a><?php } ?> </span>
				  
				<span class="scoreline_phone_no"><?php if($scorline_theme_options['phone_no'] !='') { ?>
				<a href="tel:<?php echo esc_url($scorline_theme_options['phone_no']); ?>"><i class="fa fa-phone icon"></i> <?php echo esc_attr($scorline_theme_options['phone_no']); ?></a><?php } ?>
				<?php } ?></span>
				<div class="scoreline_social_media_head">
				<ul class="social-icons hd-sc">
				<?php if($scorline_theme_options['fb_link']!='') { ?>
					<li class="facebook scoreline_social_fn_link" data-toggle="tooltip" data-placement="bottom" title="Facebook"><a  href="<?php echo esc_url($scorline_theme_options['fb_link']); ?>"><i class="fa fa-facebook"></i></a></li>
					<?php } if($scorline_theme_options['gplus']!='') { ?>
					<li class="googleplus" data-toggle="tooltip" data-placement="bottom" title="Google Plus"><a href="<?php echo esc_url($scorline_theme_options['gplus']); ?>"><i class="fa fa-google-plus"></i></a></li>
					<?php } if($scorline_theme_options['instagram_link']!='') { ?>					
					<li class="instagram" data-toggle="tooltip" data-placement="bottom" title="Instagram"><a href="<?php echo esc_url($scorline_theme_options['instagram_link']); ?>"><i class="fa fa-instagram"></i></a></li>
					<?php } if($scorline_theme_options['youtube_link']!='') { ?>
					<li class="youtube" data-toggle="tooltip" data-placement="bottom" title="Youtube"><a href="<?php echo esc_url($scorline_theme_options['youtube_link']) ; ?>"><i class="fa fa-youtube"></i></a></li>
	                <?php } if($scorline_theme_options['linkedin_link']!='') { ?>
					<li class="linkedin" data-toggle="tooltip" data-placement="bottom" title="linkedin"><a href="<?php echo esc_url($scorline_theme_options['linkedin_link']) ; ?>"><i class="fa fa-linkedin"></i></a></li>
	                <?php } if($scorline_theme_options['pinterest_link']!='') { ?>
					<li class="pinterest" data-toggle="tooltip" data-placement="bottom" title="pinterest"><a href="<?php echo esc_url($scorline_theme_options['pinterest_link']) ; ?>"><i class="fa fa-pinterest"></i></a></li>
	                <?php } ?>
				</ul>
			</div>
				</div>
				<?php } ?>
			</div>
		</div>
<!-- menu-start -->	
		<nav class="navbar navbar-static-top home-menu-list">
			<div class="container">
				<div class="navbar-header">
					<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
						<span class="sr-only"><?php esc_html_e('Toggle navigation','scoreline'); ?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="navbar-collapse collapse">
					<?php wp_nav_menu( array(
						'theme_location' => 'primary-menu',
						'menu_class' => 'nav navbar-nav navbar-right',
						'fallback_cb' => 'weblizar_fallback_page_menu',
						'walker' => new scoreline_nav_walker(),
						)
						);	?>			 
				</div>
			</div>
		</nav>
	<!-- menu-end -->
<?php if($scorline_theme_options['sticky_header']=='on') { ?> 
<script>
jQuery(document).ready(function() {
		jQuery(window).scroll(function () {
		if( jQuery(window).width() > 768) {
			if (jQuery(this).scrollTop() > 220) {
			jQuery('.home-menu-list').addClass('sticky-head');
			}
			else {
		jQuery('.home-menu-list').removeClass('sticky-head');
		}
		}
			else {
			if (jQuery(this).scrollTop() > 250) {
				jQuery('.home-menu-list').addClass('sticky-head');
			}else {
		jQuery('.home-menu-list').removeClass('sticky-head');
		}
			}				
		});
		
});	 
</script>
<?php } ?>