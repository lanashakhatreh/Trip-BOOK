<?php
require( get_template_directory() . '/core/default_menu_walker.php' );
require( get_template_directory() . '/core/scoreline_nav_walker.php' );
require( get_template_directory() . '/comment-function.php' );
require( get_template_directory() . '/customizer.php' ); 
require( get_template_directory() . '/core/class-tgm-plugin-activation.php' );

function scoreline_style_theme(){
	//style
	wp_enqueue_style('scoreline-bootstrap',get_template_directory_uri() . '/css/bootstrap/bootstrap.css');
	wp_enqueue_style('scoreline-font-awesome',get_template_directory_uri() . '/css/font-awesome.css');
    wp_enqueue_style('scoreline-swiper', get_template_directory_uri(). '/css/swiper.css');
    wp_enqueue_style('scoreline-hover', get_template_directory_uri(). '/css/hover.css');
	wp_enqueue_style('scoreline-color',get_template_directory_uri() . '/css/color/color.css');
    wp_enqueue_style('scoreline-media', get_template_directory_uri(). '/css/media.css');
	wp_enqueue_style('scoreline-animate', get_template_directory_uri(). '/css/animate.css');
    wp_enqueue_style('scoreline-style', get_template_directory_uri(). '/style.css');
	
	//JS
	wp_enqueue_script('scoreline-bootstrap', get_template_directory_uri(). '/css/bootstrap/bootstrap.js',array('jquery'));    
	wp_enqueue_script('scoreline-script-js',get_template_directory_uri().'/js/script.js',array( 'jquery' ), '0.2', true);
	wp_enqueue_script('scoreline-swiper', get_template_directory_uri(). '/js/swiper.js');
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'scoreline_style_theme' );

function scoreline_default_settings()
{
	$ImageUrl1 = get_template_directory_uri() ."/images/head1.jpg";
	$ImageUrl2 = get_template_directory_uri() ."/images/head2.jpg";
	$ImageUrl3 = get_template_directory_uri() ."/images/head3.jpg";
	$ImageUrl4 = get_template_directory_uri() ."/images/head4.jpg";
	$scorline_theme_options=array(
	
			//Logo header
			'header_social_media_in_enabled' => '',
			'email_id' => '',
			'phone_no' => '',
			'snoweffect' => '',
			'sticky_header' => '',
			'scoreline_sliders' => '1',
			
	        // for slider
	        'slide_image_1' => $ImageUrl1,
			'slide_title_1' => __('Slide Title', 'scoreline' ),
			'slide_desc_1' => __('Lorem Ipsum is simply dummy text of the printing', 'scoreline' ),
			'slide_btn_text_1' => __('Read More', 'scoreline' ),
			'slide_btn_link_1' => '#',
			'slide_image_2' => $ImageUrl2,
			'slide_title_2' => __('variations of passages', 'scoreline' ),
			'slide_desc_2' => __('Contrary to popular belief, Lorem Ipsum is not simply random text', 'scoreline' ),
			'slide_btn_text_2' => __('Read More', 'scoreline' ),
			'slide_btn_link_2' => '#',
			'slide_image_3' => $ImageUrl3,
			'slide_title_3' => __('Contrary to popular ', 'scoreline' ),
			'slide_desc_3' => __('Aldus PageMaker including versions of Lorem Ipsum, rutrum turpi', 'scoreline' ),
			'slide_btn_text_3' => __('Read More', 'scoreline' ),
			'slide_btn_link_3' => '#',
			'slide_image_4' => $ImageUrl4,
			'slide_title_4' => __('Contrary to popular ', 'scoreline' ),
			'slide_desc_4' => __('Aldus PageMaker including versions of Lorem Ipsum, rutrum turpi', 'scoreline' ),
			'slide_btn_text_4' => __('Read More', 'scoreline' ),
			'slide_btn_link_4' => '#',
			
			'slider_image_1' => '',
			'slider_image_2' => '',
			'slider_image_3' => '',
			'slider_image_4' => '',
			
			//for service
			'ser_img_1' => '',
			'ser_img_2' => '',
			'ser_img_3' => '',
			'home_service_heading' => __('Our Services','scoreline'),
			'service_desc' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed turpis quam, ultricies at luctus eget, vestibu lum vel elit. Nulla et diam non dui blandit tincidunt.', 'scoreline'),
			'show_service'=>'on',
			
			 // for Extra section using Shortcode
			'section_title' => __('Extra Section', 'scoreline' ),
			'sec_desc' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed turpis quam, ultricies at luctus eget, vestibu lum vel elit. Nulla et diam non dui blandit tincidunt.', 'scoreline'),
			'show_extra' => 'on',
			'plugin_shortcode' => '',
			
			// For Blogs
			'blog_title' => __('Latest Blog', 'scoreline' ),
			'show_blog' => 'on',
			'blog_desc' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed turpis quam, ultricies at vestibu lum vel elit. Nulla et diam non dui blandit tincidunt.', 'scoreline'),
			
			// footer Callou Area
			'fc_title' => __('Are you ready to start? Get your version of Score Line today!', 'scoreline'),
			'fc_btn_txt' => __('Purchase Now', 'scoreline' ),
			'fc_btn_link' => '#',
			'show_callout' => 'on',
			
			//footer area
			'footer_section_social_media_enbled'=>'',
			'fb_link' =>"#",
			'gplus' =>"#",
			'instagram_link' => '#',
			'youtube_link' =>"#",
			'linkedin_link' =>"#",
			'pinterest_link' =>"#",

			'footer_customizations' => __(' ', 'scoreline' ),
			'developed_by_text' => __(' ', 'scoreline' ),
			'developed_by_weblizar_text' => __(' ', 'scoreline' ),
			'developed_by_link' => '',
			);
			
return apply_filters( 'scoreline_options', $scorline_theme_options );
	
}

// Options API	
function scoreline_get_options() 
{
    return wp_parse_args( 
        get_option( 'scoreline_options', array()) , scoreline_default_settings() 
    );    
}
/*After Theme Setup*/
add_action( 'after_setup_theme', 'scoreline_setup' ); 	
function scoreline_setup()
   {	
		global $content_width;
		//content width
		if ( ! isset( $content_width ) ) $content_width = 630; //px
	
		// Load text domain for translation-ready
		load_theme_textdomain( 'scoreline', get_template_directory() . '/lang' );	
		add_theme_support( 'title-tag' );
			$args = array(
				'flex-width'    => true,
				'width'         => 2000,
				'flex-height'    => true,
				'height'        => 100,
			);
			add_theme_support( 'custom-header', $args );
					$args = array('default-color' => '#fff',);
		add_theme_support('custom-background', $args);
		add_editor_style();
		add_image_size('scoreline-post-thumb',340,210,true);
		//Blogs thumbs
		add_image_size('scoreline_page_thumb',730,350,true);
		add_theme_support( 'post-thumbnails' );
        add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-logo', array(
							'height'      => 100,
							'width'       => 300,
							'flex-height' => false,
							'flex-width'  => false,
						) );
        add_theme_support( 'woocommerce' );
        add_theme_support( 'customize-selective-refresh-widgets' );
		
		// For Menu
		register_nav_menu( 'primary-menu', __( 'Primary Menu', 'scoreline' ) );
	}
//For home blog content
function scoreline_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'scoreline_excerpt_more');

// Register Sidebar
add_action( 'widgets_init', 'scoreline_widget_sidebar');
	function scoreline_widget_sidebar() {
	/*sidebar*/
	register_sidebar( array(
			'name' => __( 'Sidebar Primary', 'scoreline' ),
			'id' => 'sidebar-primary',
			'description' => __( 'The primary sidebar area', 'scoreline' ),
			'before_widget' => '<div class="col-md-12 scoreline-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>'
		) );

	register_sidebar( array(
			'name' => __( 'Footer Widget Area', 'scoreline' ),
			'id' => 'footer-widget-area',
			'description' => __( 'footer widget area', 'scoreline' ),
			'before_widget' => '<div class="col-md-3 col-sm-6 footer-widget">',
			'after_widget' => '</div>',
			'before_title' => '<div class="col-md-12 footer-widget-heading"><h2>',
			'after_title' => '</h2></div>'
		) );           
	}

	function scoreline_link_pages(){
	$defaults = array(
		'before'           => '<div class="scoreline_blog_pagination"><div class="scoreline_blog_pagi">' . __( 'Pages:','scoreline'  ),
		'after'            => '</div></div>',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => __( 'Next page','scoreline' ),
		'previouspagelink' => __( 'Previous page','scoreline'),
		'pagelink'         => '%',
		'echo'             => 1
	);
	wp_link_pages( $defaults );
}

//breadcrums
function scoreline_breadcrumbs() {
    $delimiter = '';
    $home = __('Home', 'scoreline' ); // text for the 'Home' link
    $before = '<li>'; // tag before the current crumb
    $after = '</li>'; // tag after the current crumb
    echo '<ul class="scoreline-breadcrumb">';
    global $post;
    $homeLink = esc_url(home_url());
    echo '<li><a href="' . $homeLink . '">' . $home . '</a></li>' . $delimiter . ' ';
    if (is_category()) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0)
            echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
        echo $before . ' __("Archive by category","scoreline") "' . single_cat_title('', false) . '"' . $after;
    } elseif (is_day()) {
        echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
        echo '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
        echo $before . get_the_time('d') . $after;
    } elseif (is_month()) {
        echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
        echo $before . get_the_time('F') . $after;
    } elseif (is_year()) {
        echo $before . get_the_time('Y') . $after;
    } elseif (is_single() && !is_attachment()) {
        if (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } else {
            $cat = get_the_category();
            $cat = $cat[0];
            //echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo $before . get_the_title() . $after;
        }
		
    } elseif (!is_single() && !is_page() && get_post_type() != 'post') {
        $post_type = get_post_type_object(get_post_type());
        echo $before . $post_type->labels->singular_name . $after;
    } elseif (is_attachment()) {
        $parent = get_post($post->post_parent);
        $cat = get_the_category($parent->ID);
        $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo '<li><a href="' . esc_url(get_permalink($parent)) . '">' . $parent->post_title . '</a></li> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_page() && !$post->post_parent) {
        echo $before . get_the_title() . $after;
    } elseif (is_page() && $post->post_parent) {
        $parent_id = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<li><a href="' . esc_url(get_permalink($page->ID)) . '">' . get_the_title($page->ID) . '</a></li>';
            $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb)
            echo $crumb . ' ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_search()) {
        echo $before . __("Search results for","scoreline")  . get_search_query() . '"' . $after;

    } elseif (is_tag()) {        
		echo $before . __('Tag','scoreline') . single_tag_title('', false) . $after;
    } elseif (is_author()) {
        global $author;
        $userdata = get_userdata($author);
        echo $before . __("Articles posted by","scoreline") . $userdata->display_name . $after;
    } elseif (is_404()) {
        echo $before . __("Error 404","scoreline") . $after;
    }
    
    echo '</ul>';
	}

function scoreline_navigation() { ?>
	<div class="scoreline_blog_pagination">
	<div class="scoreline_blog_pagi">
	<span class="previous"><?php previous_posts_link(__('&laquo; Older Post', 'scoreline')); ?></span>
	<span class="next"><?php next_posts_link(__('Newer Post &raquo;','scoreline')); ?></span>
	</div>
	</div>
	<?php }

	/****--- Navigation for Single ---***/
	function scoreline_navigation_posts() { ?>
	<div class="navigation_en">
	<nav id="scoreline_nav"> 
	<div class="col-md-6 nav-previous">
	<?php previous_post_link('&laquo; %link'); ?>
	</div>
	<div class="col-md-6 nav-next">
	<p><?php next_post_link('%link &raquo;'); ?></p>
	</div> 
	</nav>
	</div>	
 <?php	} 

// For Plugin Activation
add_action('tgmpa_register','scoreline_plugin_recommend');
function scoreline_plugin_recommend(){
	$plugins = array(
	array(
            'name'      => 'Responsive Gallery',
            'slug'      => 'responsive-gallery-with-lightbox',
            'required'  => false,
	),
	array(
            'name'      => 'Shortcodes Elements ',
            'slug'      => 'shortcodes-elements',
            'required'  => false,
	),
);
    tgmpa( $plugins );
}

$theme_options = scoreline_get_options();
if($theme_options['snoweffect']!=''){
	function snow_script() {
	wp_enqueue_script('snow', get_template_directory_uri() .'/js/snowstorm.js');
	}
	add_action( 'wp_enqueue_scripts', 'snow_script' );
}

if ( is_admin() && isset($_GET['activated'])  && $pagenow == "themes.php" ) {
	add_action( 'admin_notices', 'scoreline_activation_notice' );
}
add_action( 'admin_notices', 'scoreline_activation_notice' );
function scoreline_activation_notice(){
	wp_enqueue_style('admin',  get_template_directory_uri() .'/core/admin/admin-themes.css');
    ?>
    <div class="notice notice-success is-dismissible"> 
		<p><?php echo esc_html__( 'Thanks for installing Scoreline! 
 Please visit our best theme, plugin & offers, make sure you visit our welcome page.', 'scoreline' ); ?><a class="pro" target="_blank" href="<?php echo admin_url('/themes.php?page=scoreline') ?>"><?php echo esc_html__( 'Visit Welcome Page', 'scoreline' ); ?></a></p>
	</div>
    <?php
}

if (is_admin()) {
	require('core/admin/admin-themes.php');
}
?>