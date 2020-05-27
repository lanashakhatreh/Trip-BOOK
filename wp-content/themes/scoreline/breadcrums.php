<div class="cover">
<div class="container-fluid space hd-cover">	
	<div class="container">
	<div class="scoreline-breadcrumb-title">
		<h1><?php if(is_home()){echo "";}else{the_title();} ?></h1>
		<?php if (function_exists('scoreline_breadcrumbs')) scoreline_breadcrumbs(); ?>
	</div>
	</div>	
</div>
</div>