<?php 
// code for comment
if ( ! function_exists( 'scoreline_comment' ) ) :
function scoreline_comment( $comment, $args, $depth ) 
{
	//get theme data
	global $comment_data;
	//translations
	$leave_reply = $comment_data['translation_reply_to_coment'] ? $comment_data['translation_reply_to_coment'] : 
	'<i class="fa fa-reply-all"></i>'.__('Reply','scoreline'); ?>
<div class="comment-box">
    <div class="col-xs-12 comment">
			<a class="col-xs-2 comment-img">
            <?php echo get_avatar($comment,$size = '90'); ?>
            </a>
           <div class="col-xs-10 comment-detail">
				<h4><?php comment_author();?></h4>	
				<h5>
				<?php if ( ('d M  y') == get_option( 'date_format' ) ) : 				
				 comment_date('F j, Y');
				 else : 
				 comment_date(); 
				 endif; ?>
				<?php esc_html_e('at','scoreline');?>&nbsp;<?php comment_time('g:i a'); ?></h5>
				<?php comment_text() ; ?>				
				<div>
				<?php comment_reply_link(array_merge( $args, array('reply_text' => $leave_reply,'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				
				</div>
				
				<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php esc_attr_e( 'Your comment is awaiting moderation.', 'scoreline' ); ?></em>
				<br/>
				<?php endif; ?>
				
			</div>							
	</div>	
</div>	
<?php
}
endif;
?>