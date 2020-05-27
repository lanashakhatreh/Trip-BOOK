<?php if ( post_password_required() ) : ?>
	<p><?php esc_attr_e( 'This post is password protected. Enter the password to view any comments.', 'scoreline'); ?></p>
	<?php return; endif; ?>
    <?php if ( have_comments() ) : ?>
			
	<div class="col-md-12 comment-head"><h2><?php esc_attr_e( 'Comments', 'scoreline' ); ?></h2></div>
	<?php wp_list_comments( array( 'callback' => 'scoreline_comment' ) ); ?>		
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php esc_attr_e( 'Comment navigation', 'scoreline' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'scoreline' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'scoreline' ) ); ?></div>
		</nav>
		<?php endif;  ?>
			
	<?php endif; ?>
<?php if ( comments_open() ) : ?>
 <div class="row comment-box">
	<div class="col-xs-12 comment">
	<?php $fields=array(
		'name' => '<div class="col-md-12 scoreline-blog-form"><label>'. __( 'Name','scoreline').'<small>*</small></label><input name="name" id="name" type="text"></div>',
		'email' => '<div class="col-md-12 scoreline-blog-form"><label>'. __( 'Email','scoreline').'<small>*</small></label><input name="email" id="email" type="text"></div>',
	);
	function scoreline_fields($fields) { 
		return $fields;
	}
	add_filter('wl_comment_form_default_fields','scoreline_fields');
		$defaults = array(
		'fields'=> apply_filters( 'wl_comment_form_default_fields', $fields ),
		'comment_field'=> '<div class="col-md-12 scoreline-blog-form"><label for="message"> Message *</label>
		<textarea id="comment" name="comment" rows="10" cols="80"></textarea></div>',		
		'logged_in_as' => '<p class="logged-in-as">' . __( "Logged in as ",'scoreline' ).'<a href="'. admin_url( 'profile.php' ).'">'.$user_identity.'</a>'. '<a href="'. wp_logout_url(get_permalink()) .'" title="Log out of this account">'.__(" Log out?",'scoreline').'</a>' . '</p>',
		 /* translators: %s: reply to name */
		'title_reply_to' => __( 'Leave a Reply to %s','scoreline'),
		'id_submit' => 'commentSubmit',
		'label_submit'=>__( 'Submit Comment','scoreline'),
		'comment_notes_before'=> '',
		'comment_notes_after'=>'',
		'title_reply'=> '<h2>'.__('Leave a Comment','scoreline').'</h2>',		
		'role_form'=> 'form',		
		);
		comment_form($defaults); ?>		
		
</div>
</div>
<?php endif; ?>