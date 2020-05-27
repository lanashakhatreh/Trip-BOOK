<?php
add_action( 'customize_register', 'scoreline_customizer' );

function scoreline_customizer( $wp_customize ) {
	wp_enqueue_style('customizr', get_template_directory_uri() .'/css/customizr.css'); 
	
	$scorline_theme_options = scoreline_get_options();	
	/* Genral section */
	$wp_customize->add_panel( 'scoreline_theme_option', array(
    'title' => __( 'Theme Options','scoreline' ),
    'priority' => 1,
	) );
    $wp_customize->add_section(
        'general_sec',
        array(
            'title' => __( 'Theme General Options','scoreline' ),
            'description' => __('Here you can customize Your theme general Settings','scoreline'),
			'panel'=>'scoreline_theme_option',
			'capability'=>'edit_theme_options',
            'priority' => 35,	
        ));
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
	'selector' => '.site-title',
	'render_callback' => 'blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'custom_logo', array(
	'selector' => '.site-custom_logo',
	'render_callback' => 'custom_logo',
	) );
	
	$wp_customize->add_section(
        'general_sec',
        array(
            'title' => __( 'Theme General Options','scoreline' ),
            'description' => 'Here you can customize Your theme\'s general Settings',
			'panel'=>'scoreline_theme_option',
			'capability'=>'edit_theme_options',
            'priority' => 35,
			
        )
    );
	$wp_customize->add_setting(
		'scoreline_options[snoweffect]',
		array(
			'type'    => 'option',
			'default'=>$scorline_theme_options['snoweffect'],
			'sanitize_callback'=>'scoreline_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'snoweffect', array(
		'label'        => __( 'Snow Effect', 'scoreline' ),
		'type'=>'checkbox',
		'section'    => 'general_sec',
		'settings'   => 'scoreline_options[snoweffect]',
	) );
	$wp_customize->add_setting(
		'scoreline_options[sticky_header]',
		array(
			'type'    => 'option',
			'default'=>$scorline_theme_options['sticky_header'],
			'sanitize_callback'=>'scoreline_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'sticky_header', array(
		'label'        => __( 'Sticky Header On/Off', 'scoreline' ),
		'type'=>'checkbox',
		'section'    => 'general_sec',
		'settings'   => 'scoreline_options[sticky_header]',
	) );
	// For Slider Settings
	$wp_customize->add_section(
        'slider_sec',
        array(
            'title' =>  __( 'Theme Slider Options','scoreline' ),
			'panel'=>'scoreline_theme_option',
            'description' => __('Here you can manage slider','scoreline'),
			'capability'=>'edit_theme_options',
            'priority' => 35,
        ) );
		
	$wp_customize->add_setting('scoreline_options[scoreline_sliders]',	array(
			'type'    => 'option',
			'default'=>'1',
			'sanitize_callback'=>'scoreline_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'scoreline_sliders', array(
		'label'        => __( 'Set Your Home Slider', 'scoreline' ),
		'description' => 'You can only set slider 1 or 2',
		'type'=>'select',
		'choices' => array(
			'1' => __( 'Slider 1', 'scoreline' ),
			'2' => __( 'Slider 2', 'scoreline' )),
		'section'    => 'slider_sec',
		'settings'   => 'scoreline_options[scoreline_sliders]',
	) );
	
	
	
	for($i=1; $i<=4; $i++){
	$wp_customize->add_setting(
		'scoreline_options[slider_image_'.$i.']',
		array(
			'type'    => 'option',
			'default'=>'',
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'scoreline_sanitize_integer',
		));
	$wp_customize->add_control( 
	new scoreline_Slider_Image_Control( 
	$wp_customize, 'slider_image_'.$i,
	array(
		'label'    => 'Slider Image '.$i, 
		'section'  => 'slider_sec',
		'settings' => 'scoreline_options[slider_image_'.$i.']',
			
	) ) );
	}
	// For Service Section
	$wp_customize->add_section('service_section',array(
	'title'=>__("Home Service Options",'scoreline'),
	'panel'=>'scoreline_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	$wp_customize->add_setting(
		'scoreline_options[show_service]',
		array(
			'type'    => 'option',
			'default'=>$scorline_theme_options['show_service'],
			'sanitize_callback'=>'scoreline_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'show_service', array(
		'label'        => __( 'Show Services on Home Page', 'scoreline' ),
		'type'=>'checkbox',
		'section'    => 'service_section',
		'settings'   => 'scoreline_options[show_service]',
	) );
	$wp_customize->add_setting(
	'scoreline_options[home_service_heading]',
		array(
		'default'=>esc_attr($scorline_theme_options['home_service_heading']),
		'type'=>'option',
		'sanitize_callback'=>'scoreline_sanitize_text',
		'capability'=>'edit_theme_options'
		));
	$wp_customize->selective_refresh->add_partial( 'scoreline_options[home_service_heading]', array(
	'selector' => '.scoreline_service_title',
	'render_callback' => 'scoreline_options[home_service_heading]',
	) );
	$wp_customize->add_control( 'home_service_heading', array(
		'label'        =>  __('Home Service Title', 'scoreline' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'scoreline_options[home_service_heading]'
	    ));
	$wp_customize->add_setting(
	'service_desc',
		array(
		'default'=>esc_attr($scorline_theme_options['service_desc']),
		'sanitize_callback'=>'scoreline_sanitize_text',
		'capability'=>'edit_theme_options'
	));	
	$wp_customize->add_control(new One_Page_Editor($wp_customize, 'service_desc', array(
		'label'        => __( 'Home Service Description', 'scoreline' ),
		'section'    => 'service_section',
		'active_callback' => 'show_on_front',
		'include_admin_print_footer' => true,
		'settings'   => 'service_desc'
	)));
		$wp_customize->selective_refresh->add_partial( 'service_desc', array(
	'selector' => '.scoreline_service_desc',
	'render_callback' => 'service_desc',
	) );




		for($i=1; $i<=3; $i++){
	$wp_customize->add_setting(
		'scoreline_options[ser_img_'.$i.']',
		array(
			'type'    => 'option',
			'default'=>'',
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'scoreline_sanitize_integer',
		));
	$wp_customize->add_control( 
	new scoreline_Slider_Image_Control( 
	$wp_customize, 'ser_img_'.$i,
	array(
		'label'    => 'Service Image '.$i, 
		'section'  => 'service_section',
		'settings' => 'scoreline_options[ser_img_'.$i.']',
			
	) ) );
	}
	$wp_customize->selective_refresh->add_partial( 'scoreline_options[ser_img_1]', array(
	'selector' => '.scoreline_home_service',
	'render_callback' => 'scoreline_options[ser_img_1]',
	) );
	
	// For Home Extra Section Section
    $wp_customize->add_section('extra_section',array(
	'title'=>__("Home Extra Section",'scoreline'),
	'panel'=>'scoreline_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	$wp_customize->add_setting(
		'scoreline_options[show_extra]',
		array(
			'type'    => 'option',
			'default'=>$scorline_theme_options['show_extra'],
			'sanitize_callback'=>'scoreline_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'show_extra', array(
		'label'        => __( 'Show Extra Section on Home Page', 'scoreline' ),
		'type'=>'checkbox',
		'section'    => 'extra_section',
		'settings'   => 'scoreline_options[show_extra]',
	) );
	$wp_customize->add_setting(
		'scoreline_options[section_title]',
		array(
			'type'    => 'option',
			'default'=>$scorline_theme_options['section_title'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'scoreline_sanitize_text',
		));
	$wp_customize->selective_refresh->add_partial( 'scoreline_options[section_title]', array(
	'selector' => '.scoreline_extra_title',
	'render_callback' => 'scoreline_options[section_title]',
	) );
	$wp_customize->add_control( 'section_title', array(
		'label'        => __( 'Home Extra Section Heading', 'scoreline' ),
		'type'=>'text',
		'section'    => 'extra_section',
		'settings'   => 'scoreline_options[section_title]'
	) );
		$wp_customize->add_setting(
	'sec_desc',
		array(
		'default'=>esc_attr($scorline_theme_options['sec_desc']),
		'sanitize_callback'=>'scoreline_sanitize_text',
		'capability'=>'edit_theme_options'
	));	
	$wp_customize->selective_refresh->add_partial( 'sec_desc', array(
	'selector' => '.scoreline_extra_desc',
	'render_callback' => 'sec_desc',
	) );
	$wp_customize->add_control(new One_Page_Editor($wp_customize, 'sec_desc', array(
		'label'        => __( 'Home Extra Section Description', 'scoreline' ),
		'section'    => 'extra_section',
		'active_callback' => 'show_on_front',
		'include_admin_print_footer' => true,
		'settings'   => 'sec_desc'
	)));
	$wp_customize->add_setting(
		'scoreline_options[plugin_shortcode]',
		array(
			'type'    => 'option',
			'default'=>$scorline_theme_options['plugin_shortcode'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'scoreline_sanitize_text',
		));
	$wp_customize->selective_refresh->add_partial( 'scoreline_options[plugin_shortcode]', array(
	'selector' => '.scoreline_extra_shortcode',
	'render_callback' => 'scoreline_options[plugin_shortcode]',
	) );
	$wp_customize->add_control( 'plugin_shortcode', array(
		'label'        => __('Home Extra Section Shortcode', 'scoreline' ),
		'type'=>'text',
		'section'    => 'extra_section',
		'settings'   => 'scoreline_options[plugin_shortcode]'
	) );
	
	// For Home Blog Section
	$wp_customize->add_section('blog_section',array(
	'title'=>__("Home Blog Options",'scoreline'),
	'panel'=>'scoreline_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	
	$wp_customize->add_setting(
		'scoreline_options[show_blog]',
		array(
			'type'    => 'option',
			'default'=>$scorline_theme_options['show_blog'],
			'sanitize_callback'=>'scoreline_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'show_blog', array(
		'label'        => __( 'Show Blog on Home Page', 'scoreline' ),
		'type'=>'checkbox',
		'section'    => 'blog_section',
		'settings'   => 'scoreline_options[show_blog]',
	) );
	

	$wp_customize->add_setting(
		'scoreline_options[blog_title]',
		array(
			'type'    => 'option',
			'default'=>$scorline_theme_options['blog_title'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'scoreline_sanitize_text',
		));
	$wp_customize->selective_refresh->add_partial( 'scoreline_options[blog_title]', array(
	'selector' => '.scoreline_blog_title',
	'render_callback' => 'scoreline_options[blog_title]',
	) );
	$wp_customize->add_control( 'blog_title', array(
		'label'        => __('Home Blog Heading', 'scoreline' ),
		'type'=>'text',
		'section'    => 'blog_section',
		'settings'   => 'scoreline_options[blog_title]'
	) );

	$wp_customize->add_setting(
	'blog_desc',
		array(
		'default'=>esc_attr($scorline_theme_options['blog_desc']),
		'sanitize_callback'=>'scoreline_sanitize_text',
		'capability'=>'edit_theme_options'
	));	
	$wp_customize->selective_refresh->add_partial( 'blog_desc', array(
	'selector' => '.scoreline_blog_desc',
	'render_callback' => 'blog_desc',
	) );
	$wp_customize->add_control(new One_Page_Editor($wp_customize, 'blog_desc', array(
		'label'        => __( 'Home Extra Section Description', 'scoreline' ),
		'section'    => 'blog_section',
		'active_callback' => 'show_on_front',
		'include_admin_print_footer' => true,
		'settings'   => 'blog_desc'
	)));
	
	 // Social section
    $wp_customize->add_section('social_section',array(
	'title'=>__(" Social Options",'scoreline'),
	'panel'=>'scoreline_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	$wp_customize->add_setting(
	'scoreline_options[header_social_media_in_enabled]',
		array(
		'default'=>esc_attr($scorline_theme_options['header_social_media_in_enabled']),
		'type'=>'option',
		'sanitize_callback'=>'scoreline_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'scoreline_options[header_social_media_in_enabled]', array(
	'selector' => '.scoreline_social_media_head',
	'render_callback' => 'scoreline_options[header_social_media_in_enabled]',
	) );
	$wp_customize->add_control( 'header_social_media_in_enabled', array(
		'label'        => __( 'Enable Social Media Icons in Header', 'scoreline' ),
		'type'=>'checkbox',
		'section'    => 'social_section',
		'settings'   => 'scoreline_options[header_social_media_in_enabled]'
	) );
	$wp_customize->add_setting(
	'scoreline_options[footer_section_social_media_enbled]',
		array(
		'default'=>esc_attr($scorline_theme_options['footer_section_social_media_enbled']),
		'type'=>'option',
		'sanitize_callback'=>'scoreline_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'scoreline_options[footer_section_social_media_enbled]', array(
	'selector' => '.scoreline_social_media_footer',
	'render_callback' => 'scoreline_options[footer_section_social_media_enbled]',
	) );
	$wp_customize->add_control( 'footer_section_social_media_enbled', array(
		'label'        => __( 'Enable Social Media Icons in Footer', 'scoreline' ),
		'type'=>'checkbox',
		'section'    => 'social_section',
		'settings'   => 'scoreline_options[footer_section_social_media_enbled]'
	) );
	$wp_customize->add_setting(
	'scoreline_options[email_id]',
		array(
		'default'=>esc_attr($scorline_theme_options['email_id']),
		'type'=>'option',
		'sanitize_callback'=>'sanitize_email',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'scoreline_options[email_id]', array(
	'selector' => '.scoreline_email_id',
	'render_callback' => 'scoreline_options[email_id]',
	) );
	$wp_customize->add_control( 'email_id', array(
		'label'        =>  __('Email ID', 'scoreline' ),
		'type'=>'email',
		'section'    => 'social_section',
		'settings'   => 'scoreline_options[email_id]'
	) );
	$wp_customize->add_setting(
	'scoreline_options[phone_no]',
		array(
		'default'=>esc_attr($scorline_theme_options['phone_no']),
		'type'=>'option',
		'sanitize_callback'=>'scoreline_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'scoreline_options[phone_no]', array(
	'selector' => '.scoreline_phone_no',
	'render_callback' => 'scoreline_options[phone_no]',
	) );
	$wp_customize->add_control( 'phone_no', array(
		'label'        =>  __('Phone Number', 'scoreline' ),
		'type'=>'text',
		'section'    => 'social_section',
		'settings'   => 'scoreline_options[phone_no]'
	) );

	$wp_customize->add_setting(
	'scoreline_options[fb_link]',
		array(
		'default'=>esc_attr($scorline_theme_options['fb_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'scoreline_options[fb_link]', array(
	'selector' => '.scoreline_social_fn_link',
	'render_callback' => 'scoreline_options[fb_link]',
	) );
	$wp_customize->add_control( 'fb_link', array(
		'label'        => __( 'Facebook', 'scoreline' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'scoreline_options[fb_link]'
	) );
	$wp_customize->add_setting(
	'scoreline_options[gplus]',
		array(
		'default'=>esc_attr($scorline_theme_options['gplus']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'gplus', array(
		'label'        => __( 'Google+', 'scoreline' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'scoreline_options[gplus]'
	) );
	
	$wp_customize->add_setting(
	'scoreline_options[instagram_link]',
		array(
		'default'=>esc_attr($scorline_theme_options['instagram_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'instagram_link', array(
		'label'        => __( 'Instagram', 'scoreline' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'scoreline_options[instagram_link]'
	) );
	$wp_customize->add_setting(
	'scoreline_options[youtube_link]',
		array(
		'default'=>esc_attr($scorline_theme_options['youtube_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		) );
	$wp_customize->add_control( 'youtube_link', array(
		'label'        => __( 'Youtube', 'scoreline' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'scoreline_options[youtube_link]'
	) );
	$wp_customize->add_setting(
	'scoreline_options[linkedin_link]',
		array(
		'default'=>esc_attr($scorline_theme_options['linkedin_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		) );
	$wp_customize->add_control( 'linkedin_link', array(
		'label'        => __( 'Linkedin', 'scoreline' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'scoreline_options[linkedin_link]'
	) );
	$wp_customize->add_setting(
	'scoreline_options[pinterest_link]',
		array(
		'default'=>esc_attr($scorline_theme_options['pinterest_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		) );
	$wp_customize->add_control( 'pinterest_link', array(
		'label'        => __( 'Pinterst', 'scoreline' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'scoreline_options[pinterest_link]'
	) );
	
	// Footer Callout Section
	$wp_customize->add_section('callout_section',array(
	'title'=>__("Footer Call-Out Options",'scoreline'),
	'panel'=>'scoreline_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	$wp_customize->add_setting(
		'scoreline_options[show_callout]',
		array(
			'type'    => 'option',
			'default'=>$scorline_theme_options['show_callout'],
			'sanitize_callback'=>'scoreline_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'show_callout', array(
		'label'        => __( 'Show Callout Area on Home Page', 'scoreline' ),
		'type'=>'checkbox',
		'section'    => 'callout_section',
		'settings'   => 'scoreline_options[show_callout]',
	) );
	$wp_customize->add_setting(
	'scoreline_options[fc_title]',
		array(
		'default'=>esc_attr($scorline_theme_options['fc_title']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'scoreline_sanitize_text',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'scoreline_options[fc_title]', array(
	'selector' => '.scoreline_call_out_title',
	'render_callback' => 'scoreline_options[fc_title]',
	) );
	$wp_customize->add_control( 'fc_title', array(
		'label'        => __( 'Footer callout Title', 'scoreline' ),
		'type'=>'text',
		'section'    => 'callout_section',
		'settings'   => 'scoreline_options[fc_title]'
	) );
	$wp_customize->add_setting(
	'scoreline_options[fc_btn_txt]',
		array(
		'default'=>esc_attr($scorline_theme_options['fc_btn_txt']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'scoreline_sanitize_text',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'scoreline_options[fc_btn_txt]', array(
	'selector' => '.scoreline_call_out_buttun',
	'render_callback' => 'scoreline_options[fc_btn_txt]',
	) );
	$wp_customize->add_control( 'fc_btn_txt', array(
		'label'        => __( 'Footer callout Button Text', 'scoreline' ),
		'type'=>'text',
		'section'    => 'callout_section',
		'settings'   => 'scoreline_options[fc_btn_txt]'
	) );
	$wp_customize->add_setting(
	'scoreline_options[fc_btn_link]',
		array(
		'default'=>esc_attr($scorline_theme_options['fc_btn_link']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'scoreline_sanitize_text',
		)
	);
	$wp_customize->add_control( 'fc_btn_link', array(
		'label'        => __( 'Footer callout Button Link', 'scoreline' ),
		'type'=>'text',
		'section'    => 'callout_section',
		'settings'   => 'scoreline_options[fc_btn_link]'
	) );

	// Footer Section
	$wp_customize->add_section('footer_section',array(
	'title'=>__("Footer Options",'scoreline'),
	'panel'=>'scoreline_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	$wp_customize->add_setting(
	'scoreline_options[footer_customizations]',
		array(
		'default'=>esc_attr($scorline_theme_options['footer_customizations']),
		'type'=>'option',
		'sanitize_callback'=>'scoreline_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'scoreline_options[footer_customizations]', array(
	'selector' => '.scoreline_footer_text',
	'render_callback' => 'scoreline_options[footer_customizations]',
	) );
	$wp_customize->add_control( 'footer_customizations', array(
		'label'        => __( 'Footer Customization Text', 'scoreline' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'scoreline_options[footer_customizations]'
	) );
	
	$wp_customize->add_setting(
	'scoreline_options[developed_by_text]',
		array(
		'default'=>esc_attr($scorline_theme_options['developed_by_text']),
		'type'=>'option',
		'sanitize_callback'=>'scoreline_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'developed_by_text', array(
		'label'        => __( 'Developed By Text', 'scoreline' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'scoreline_options[developed_by_text]'
	) );
	$wp_customize->add_setting(
	'scoreline_options[developed_by_weblizar_text]',
		array(
		'default'=>esc_attr($scorline_theme_options['developed_by_weblizar_text']),
		'type'=>'option',
		'sanitize_callback'=>'scoreline_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'developed_by_weblizar_text', array(
		'label'        => __( 'Developed By Link Text', 'scoreline' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'scoreline_options[developed_by_weblizar_text]'
	) );
	$wp_customize->add_setting(
	'scoreline_options[developed_by_link]',
		array(
		'default'=>esc_attr($scorline_theme_options['developed_by_link']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_control( 'developed_by_link', array(
		'label'        => __( 'Developed By Link', 'scoreline' ),
		'type'=>'url',
		'section'    => 'footer_section',
		'settings'   => 'scoreline_options[developed_by_link]'
	) ); 

		// home layout //
	$wp_customize->add_section('Home_Page_Layout',array(
    'title'=>__("Home Page Layout Option",'scoreline'),
    'panel'=>'scoreline_theme_option',
    'capability'=>'edit_theme_options',
    'priority' => 37,
    ));
	$wp_customize->add_setting('home_reorder',
            array(
				'type'=>'theme_mod',
                'sanitize_callback' => 'sanitize_json_string',
				'capability'        => 'edit_theme_options',
            )
        );
    $wp_customize->add_control(new scoreline_Custom_sortable_Control($wp_customize,'home_reorder', array(
		'label'=>__( 'Front Page Layout Option', 'scoreline' ),
        'section' => 'Home_Page_Layout',
        'type'    => 'home-sortable',
        'choices' => array(
            'service'      => __('Home Services', 'scoreline'),
            'extra'     => __('Home extra', 'scoreline'),
            'blog'        => __('Home Blog', 'scoreline'),
        ),
		'settings'=>'home_reorder',
    )));
	// home layout close //
	
}

function scoreline_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
function scoreline_sanitize_checkbox( $input ) {
   if ( $input == 1 ) {
        return 'on' ;
    } else {
        return '';
    }
}
function scoreline_sanitize_integer( $input ) {
    return (int)($input);
}
function sanitize_json_string($json){
    $sanitized_value = array();
    foreach (json_decode($json,true) as $value) {
        $sanitized_value[] = esc_attr($value);
    }
    return json_encode($sanitized_value);
}


/* class for thumbnail images */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'scoreline_Slider_Image_Control' ) ) :
class scoreline_Slider_Image_Control extends WP_Customize_Control 
{  
 public function render_content(){ ?>
	<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	<?php $args = array( 'post_type' => 'post', 'post_status'=>'publish','posts_per_page'=> -1); 
		$slide_id = new WP_Query( $args ); ?>
		<select <?php $this->link(); ?> >
		<option value= "" <?php if($this->value()=='') echo 'selected="selected"';?>><?php esc_html_e('Default Image','scoreline'); ?></option>
		<?php if($slide_id->have_posts()):
			while($slide_id->have_posts()):
				$slide_id->the_post();
				if(has_post_thumbnail()){ ?>
				 <option value= "<?php echo esc_attr(get_the_id()); ?>"<?php if($this->value()== get_the_id() ) echo 'selected="selected"';?>><?php the_title(); ?></option>
				<?php }
			endwhile; 
	     endif; ?>
		 </select>
		 <?php
}  /* public function ends */
}/*   class ends */
endif;

/* class for categories */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'scoreline_category_Control' ) ) :
class scoreline_category_Control extends WP_Customize_Control 
{  
 public function render_content(){ ?>
	<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	<?php  
		$scoreline_category = get_categories(); ?>
		<select <?php $this->link(); ?> >
		<?php foreach($scoreline_category as $category){ ?>
		<option value= "<?php echo esc_attr($category->cat_name); ?>" <?php if($this->value()== $category->cat_name ) echo 'selected="selected"';?>><?php echo esc_attr($category->cat_name); ?></option>
		<?php } ?>
		 </select>
		 <?php
}  /* public function ends */
}/*   class ends */
endif; 


if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'scoreline_Custom_sortable_Control' ) ) :
class scoreline_Custom_sortable_Control extends WP_Customize_Control
{
    public $type = 'home-sortable';
    /*Enqueue resources for the control*/
    public function enqueue()
    {

        wp_enqueue_style('customizer-repeater-admin-stylesheet', get_template_directory_uri() . '/assets/customizer_js_css/css/scoreline-admin-style.css', time());

        wp_enqueue_script('customizer-repeater-script', get_template_directory_uri() . '/assets/customizer_js_css/js/scoreline-customizer_repeater.js', array('jquery', 'jquery-ui-draggable'), time(), true);

    }
    public function render_content()
    {
        if (empty($this->choices)) {
            return;
        }
        $values = json_decode($this->value());
        $name         = $this->id;
        ?>

		<span class="customize-control-title">
			<?php echo esc_attr($this->label); ?>
		</span>

		<?php if (!empty($this->description)): ?>
			<span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
		<?php endif;?>

		<div class="customizer-repeater-general-control-repeater customizer-repeater-general-control-droppable">
			<?php 
			if(!empty($values)){ 
				foreach ($values as $value) {?>
					<div class="customizer-repeater-general-control-repeater-container customizer-repeater-draggable ui-sortable-handle">
					<div class="customizer-repeater-customize-control-title">
						<?php echo esc_attr($this->choices[$value]); ?>
					</div>
					<input type="hidden" class="section-id" value="<?php echo esc_attr($value); ?>">
					</div>	
				<?php }?>
				
			<?php }else{
			foreach ($this->choices as $value => $label): ?>
					<div class="customizer-repeater-general-control-repeater-container customizer-repeater-draggable ui-sortable-handle">
					<div class="customizer-repeater-customize-control-title">
						<?php echo esc_attr($label); ?>
					</div>
					<input type="hidden" class="section-id" value="<?php echo esc_attr($value); ?>">
					</div>

				<?php endforeach;
			}
        		if (!empty($value)) {?>
					<input type="hidden"
					       id="customizer-repeater-<?php echo esc_attr($this->id); ?>-colector" <?php esc_url($this->link());?>
					       class="customizer-repeater-colector"
					       value="<?php echo esc_textarea(json_encode($value)); ?>"/>
					<?php
				} else {?>
					<input type="hidden"
					       id="customizer-repeater-<?php echo esc_attr($this->id); ?>-colector" <?php esc_url($this->link());?>
					       class="customizer-repeater-colector"/>
					<?php
				}?>
		</div>
		<?php
}
}
endif;


if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'One_Page_Editor' ) ) :
/* Class to create a custom tags control */
class One_Page_Editor extends WP_Customize_Control {	
	private $include_admin_print_footer = false;
	private $teeny = false;
	public $type = 'text-editor';
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
		if ( ! empty( $args['include_admin_print_footer'] ) ) {
			$this->include_admin_print_footer = $args['include_admin_print_footer'];
		}
		if ( ! empty( $args['teeny'] ) ) {
			$this->teeny = $args['teeny'];
		}
	}
	/* Enqueue scripts */
	public function enqueue() {
		wp_enqueue_script( 'one_lite_text_editor', get_template_directory_uri() . '/inc/customizer-page-editor/js/one-lite-text-editor.js', array( 'jquery' ), false, true );
	}
	/* Render the content on the theme customizer page */
	public function render_content() {
		?>

		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<input type="hidden" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>">
		<?php
		$settings = array(
			'textarea_name' => $this->id,
			'teeny' => $this->teeny,
		);
		$control_content = $this->value();
		wp_editor( $control_content, $this->id, $settings );

		if ( $this->include_admin_print_footer === true ) {
			do_action( 'admin_print_footer_scripts' );
		}
	}
}
endif;

function show_on_front() {
	if(is_front_page())
	{
		return is_front_page() && 'posts' !== get_option( 'show_on_front' );
	}
	elseif(is_home()) 
	{
		return is_home();
	}
}
?>