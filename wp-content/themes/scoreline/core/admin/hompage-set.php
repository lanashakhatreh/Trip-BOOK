<?php if (!function_exists('scoreline_infohome_page')) {
	function scoreline_infohome_page() {
	$page2=add_theme_page(__('Welcome to Scoreline', 'scoreline'), __('Set HomePage', 'scoreline'), 'edit_theme_options', 'scorelineHP', 'scoreline_display_theme_infohome_page');
	
	add_action('admin_print_styles-'.$page2, 'weblizar_admin_infohome');
	}	
}
add_action('admin_menu', 'scoreline_infohome_page');

function weblizar_admin_infohome(){
	// CSS
	wp_enqueue_style('bootstrap',  get_template_directory_uri() .'/core/admin/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style('admin',  get_template_directory_uri() .'/core/admin/admin-themes.css');
	wp_enqueue_style('font-awesome',  get_template_directory_uri() .'/css/font-awesome.css');

	//JS
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/core/admin/bootstrap/js/bootstrap.min.js');
	wp_enqueue_script('script-menu', get_template_directory_uri().'/js/script.js');
	
	
} 
if (!function_exists('scoreline_display_theme_infohome_page')) {
	function scoreline_display_theme_infohome_page() {
		$theme_data = wp_get_theme(); ?>		
<div class="wrapper">
<!-- Header -->
<header>
<div id="snow"></div>
<div class="container-fluid p_header">
	<div class="container">
		<div class="row p_head">
					<div class="col-md-4"></div>
			<div class="col-md-4">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/logo.png" class="img-responsive" alt=""/>
			</div>
			<div class="col-md-4"></div>	
		</div>
	</div>
</div>
<div class="container-fluid import-page">
	<h1>How to Use the XML File to Import the Demo Site Content</h1>
	<div class="container">
		<div class="col-md-12">
			<div class="col-md-6">
					<div class="col-md-12 button-home">					
						<a class="btn btn-success" href="https://weblizar.com/dummydata/freetheme/scoreline/scoreline.xml" download>Get Dummy Content</a>
					</div>
				<h4>1. Log-in to your WordPress backend and click on Tools -> Import in the left menu. You will see a list of systems that can import posts into WordPress, such as Blogger, Blogroll etc</h4>
				<h4>2. Choose WordPress from the list. Then run wordpress importer.</h4>	
				<h4>3. Select the demo content "scoreline.xml" file and upload it .</h4>
				<h4>4. Select any user or give a name "admin" Now check "Download attachments" ,Upload the xml file . </h4>
				
				
			</div>
			<div class="col-md-6">
				<div class="img-thumbnail">
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/import-data.jpg" class="img-responsive" alt="import-data"/>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid home-page">
	<h1>How to setup Homepage </h1>
	<div class="container">
		<div class="col-md-6">
			<h4>1. Firstly make your static page(home page).</h4>
			<h4>2. Edit this(home page) page select home template for this page from the right-side of the page.
				<a href="<?php esc_url('https://s3.postimg.org/mr6tmzdpv/home-page-select.jpg'); ?>">See Screenshot Here</a>
			</h4>
			<h4>3. Save the page.</h4>
			<h4>4. Your Are done , Check the Home Page now.</h4>
		</div>
	<div class="col-md-6">
			<div class="img-thumbnail">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/home-page.png" class="img-responsive" alt="home-page"/>
			</div>
		</div>
	</div>
</div>


<!-- Header -->

</div>
<?php
	}
}
?>