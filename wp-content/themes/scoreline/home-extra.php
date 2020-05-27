<!-- extra section -->
<?php $scorline_theme_options = scoreline_get_options();
if($scorline_theme_options['plugin_shortcode']!='') { ?>
<div class="container-fluid extra space">
	<div class="container">
		<?php if($scorline_theme_options['section_title'] !='') { ?>
			<h1 class="scoreline_extra_title"><?php echo esc_attr($scorline_theme_options['section_title']); ?></h1>		
		<?php } 
	if($scorline_theme_options['sec_desc'] !='') { ?>
		<p class="team-text scoreline_extra_desc">
			<?php echo get_theme_mod('sec_desc' , $scorline_theme_options['sec_desc']); ?>
			<?php echo esc_attr($scorline_theme_options['show_extra']); ?>
		</p>
		<?php } ?>
	
	<div class="row scoreline-extra scoreline_extra_shortcode">
		<?php echo do_shortcode($scorline_theme_options['plugin_shortcode']); ?>
	</div>
	<?php } ?>
	</div>
</div>
<!-- /extra section -->