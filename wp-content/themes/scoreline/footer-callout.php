<?php $scorline_theme_options = scoreline_get_options(); ?>
<div class="scoreline-callout-wrapper">
	<div class="container-fluid scoreline-callout space">
	    <div class="container">
			<div class="row scoreline-callout-desc scoreline_call_out_title">
		        <?php if($scorline_theme_options['fc_title'] !='') { ?>
				<div class="col-md-12">
				    <h2><?php echo esc_attr($scorline_theme_options['fc_title']);?></h2>
				</div>
			    <?php } ?>
				<div class="">
				<?php if($scorline_theme_options['fc_btn_txt'] !='') { ?>
				<div class="col-md-12 btn scoreline_call_out_buttun">
					<a href="<?php echo esc_url($scorline_theme_options['fc_btn_link']); ?>"><?php echo esc_attr($scorline_theme_options['fc_btn_txt']); ?></a>
				</div>
					<?php } ?>
		        </div>
	        </div>
        </div>
    </div>
</div>