<?php //Template Name:HOME
$scorline_theme_options = scoreline_get_options(); 
get_header();
get_template_part('home', 'slider');
if($sections = json_decode(get_theme_mod('home_reorder'),true)) {
	  foreach ($sections as $section) {
		$data = "show_".$section;
		if($scorline_theme_options[$data]=="on") {
		get_template_part('home', $section);
		}
	}
} else{
if ($scorline_theme_options['show_service']=="on"){
get_template_part('home', 'service');
}
if ($scorline_theme_options['show_extra']=="on"){
get_template_part('home', 'extra');
}
if ($scorline_theme_options['show_blog']=="on"){
get_template_part('home', 'blog');
}
}
if ($scorline_theme_options['show_callout']=="on"){
get_template_part('footer', 'callout');
}
get_footer();
?>
