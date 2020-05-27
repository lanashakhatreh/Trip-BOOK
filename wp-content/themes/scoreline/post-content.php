<?php if(is_page()): ?>
<div class="row scoreline-blog-desc">
	<div class="col-md-12 col-sm-12 scoreline-blog-text">
		<div <?php post_class();?>>
			<div class="latest-post">
				<?php if(has_post_thumbnail()): ?>
					<?php $data= array('class' =>'img-responsive'); 
						the_post_thumbnail('scoreline-post-thumb', $data); ?>
						<a href="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>"></a>	
					<?php endif; ?>
					<div class="post-text-page">
					<?php the_content(); ?>
					</div>
			</div>
		</div>
	</div>
</div>
<?php else: ?>
<div class="row scoreline-blog-desc">
<div class="col-md-12 col-sm-12 scoreline-blog-text">
    <div <?php post_class();?>>
	<div class="latest-post">
	    <?php if(has_post_thumbnail()): ?>
			<?php $data= array('class' =>'img-responsive'); 
				the_post_thumbnail('scoreline-post-thumb', $data); ?>
				<a href="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>"></a>	
		    <?php endif; ?>
			
			<div class="post-body">
				<?php if(!is_single()){ ?>
					<h3 class="post-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h3>
				<?php } else{ ?>
					<h3 class="post-title">
						<?php the_title(); ?>
					</h3>
				<?php } ?>
				<div class="post-tag">
					<?php if(get_the_tag_list() !='') { ?>
						<?php the_tags( __('Tags : ','scoreline'), ' ', '<br />'); ?>
					<?php } ?>	
				</div>
				<?php if(get_the_category_list() != '') { ?>
				<div class="category">
					<span><?php esc_html_e('Categories :','scoreline'); ?> </span><?php the_category(' '); ?> 
				</div><?php } ?>
				<div class="post-text">
				<?php the_content(__('Read More', 'scoreline')); ?>
				</div>
			</div>			
	</div>			
	</div>
</div>
</div>
<?php endif;?>