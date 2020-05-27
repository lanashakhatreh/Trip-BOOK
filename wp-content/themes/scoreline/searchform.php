<div class="form-group">
	 <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>"> 	
		<input type="text" class="form-control"  name="s" id="s" placeholder="<?php esc_attr_e( 'You can search Here...', 'scoreline' ); ?>" />
		<button class="btn" type="submit"><i class="fa fa-search"></i></button>
	 </form> 
</div>