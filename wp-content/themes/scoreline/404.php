<?php get_header(); ?>
<div class="cover">
<div class="container-fluid space hd-cover">	
	<div class="container">
	    <div class="scoreline-breadcrumb-title">
			<h1><?php esc_attr_e('404 Error','scoreline'); ?></h1>
			<ul class="scoreline-breadcrumb">
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home','scoreline'); ?></a></li>
				<li><?php esc_attr_e('404 Error','scoreline'); ?></li>
			</ul>
		</div>
	</div>	
</div>
</div>
<div class="container-fluid blogs space">
	<div class="container scoreline-blog-3 blog_gallery">
	<div class="col-md-8">
				<h2><?php esc_attr_e('404','scoreline'); ?></h2>
				<h4><?php esc_attr_e('Whoops... Page Not Found !!!','scoreline'); ?></h4>
				<p><?php esc_attr_e('We are sorry, but the page you are looking for doesn`t exist.','scoreline'); ?></p>
				<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><button id="commentSubmit" type="submit"><?php esc_attr_e('Go To Homepage','scoreline'); ?></button></a></p>
		</div>
	</div>
</div>
<?php get_footer(); ?>