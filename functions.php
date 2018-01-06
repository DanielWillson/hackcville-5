<?php
/**
 * HackCville 5.0 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package HackCville_5.0
 */

if ( ! function_exists( 'hackcville_5_0_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hackcville_5_0_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on HackCville 5.0, use a find and replace
	 * to change 'hackcville-5-0' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'hackcville-5-0', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'hackcville-5-0' ),
		'launch-menu' => esc_html__( 'Launch Menu', 'hackcville-5-0' ),
		'company-menu' => esc_html__( 'Company Menu', 'hackcville-5-0' ),
		'launch-academy-menu' => esc_html__( 'Launch Academy Menu', 'hackcville-5-0' ),
		'launch-fellowship-menu' => esc_html__( 'Launch Fellowship Menu', 'hackcville-5-0' ),
		'pioneer-menu' => esc_html__( 'Pioneer Menu', 'hackcville-5-0' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'hackcville_5_0_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	// wp_enqueue_style( 'theme-styles', get_stylesheet_directory_uri() . '/style.css', array(), filemtime( get_stylesheet_directory() . '/style.css' ) );

}
endif;
add_action( 'after_setup_theme', 'hackcville_5_0_setup' );

// enable lite mode before launch, export all custom fields to PHP and move to mu-plugins
include_once('advanced-custom-fields/acf.php');
// move to mu-plugins before launch
include_once('edit-author-slug/edit-author-slug.php');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hackcville_5_0_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hackcville_5_0_content_width', 640 );
}
add_action( 'after_setup_theme', 'hackcville_5_0_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hackcville_5_0_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'hackcville-5-0' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'hackcville-5-0' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'hackcville_5_0_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hackcville_5_0_scripts() {
	//wp_enqueue_style( 'hackcville-5-0-style', get_stylesheet_uri() );
	wp_enqueue_style( 'hackcville-5-0-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime( get_stylesheet_directory() . '/style.css' ) );


	wp_enqueue_script( 'hackcville-5-0-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'hackcville-5-0-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hackcville_5_0_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// removes admin color scheme options
remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );

// if ( ! function_exists( 'cor_remove_personal_options' ) ) {
//     /**
//     * Removes the leftover 'Visual Editor', 'Keyboard Shortcuts' and 'Toolbar' options.
//     */
//     function cor_remove_personal_options( $subject ) {
//         $subject = preg_replace( '#<h2>Personal Options</h2>.+?/table>#s', '', $subject, 1 );
//         return $subject;
//     }

//     function cor_profile_subject_start() {
//         ob_start( 'cor_remove_personal_options' );
//     }

//     function cor_profile_subject_end() {
//         ob_end_flush();
//     }
// }
// add_action( 'admin_head', 'cor_profile_subject_start' );
// add_action( 'admin_footer', 'cor_profile_subject_end' );

add_filter('user_profile_update_errors', 'wpse_236014_check_fields', 10, 3);
function wpse_236014_check_fields($errors, $update, $user) {

  // Use the $_POST variable to check required fields

  if( empty($_POST['first_name']) )
    // add an error message to the WP_Errors object 
    $errors->add( 'first_name_required',__('First name is required, please add one before saving.') );

  if( empty($_POST['last_name']) )
    // add an error message to the WP_Errors object 
    $errors->add( 'last_name_required',__('Last name is required, please add one before saving.') );

  // Add as many checks as you have required fields here

  if( empty( $errors->errors ) ){

    // Save your custom fields here if no errors are found
    // Just skip this if you don't need to do extra work.
    // Fields will save if no errors are found

  }


}

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_partner-field-group',
		'title' => 'Partner Field Group',
		'fields' => array (
			array (
				'key' => 'field_598bab47538fd',
				'label' => 'Description',
				'name' => 'description',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_598bab61538fe',
				'label' => 'Website',
				'name' => 'website',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_598bab6a538ff',
				'label' => 'Logo',
				'name' => 'logo',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_598bab8753900',
				'label' => 'Type',
				'name' => 'type',
				'type' => 'checkbox',
				'choices' => array (
					'Programming Partner' => 'Programming Partner',
					'Presenting Partner' => 'Presenting Partner',
					'Community Partner' => 'Community Partner',
					'Student Organization Partner' => 'Student Organization Partner',
					'Friend of HackCville' => 'Friend of HackCville',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'partner',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_program-field-group',
		'title' => 'Program Field Group',
		'fields' => array (
			array (
				'key' => 'field_5989195dd9c6c',
				'label' => 'Active Program',
				'name' => 'active_program',
				'type' => 'true_false',
				'instructions' => 'Check if the program is currently being offered.',
				'message' => '',
				'default_value' => 1,
			),
			array (
				'key' => 'field_59930299aee13',
				'label' => 'Program Icon',
				'name' => 'program_icon',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_598bb076f314c',
				'label' => 'Program Hero Image',
				'name' => 'program_hero_image',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_59891c23d9c77',
				'label' => 'Application Open Date',
				'name' => 'application_open_date',
				'type' => 'date_picker',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5989195dd9c6c',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'date_format' => 'yymmdd',
				'display_format' => 'mm/dd/yy',
				'first_day' => 0,
			),
			array (
				'key' => 'field_59891cc1d9c7b',
				'label' => 'Application Close Date',
				'name' => 'application_close_date',
				'type' => 'date_picker',
				'date_format' => 'yymmdd',
				'display_format' => 'mm/dd/yy',
				'first_day' => 0,
			),
			array (
				'key' => 'field_59891c5dd9c79',
				'label' => 'Application Status',
				'name' => 'application_status',
				'type' => 'true_false',
				'instructions' => 'Check this box if applications are open.',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_59891ba1d9c76',
				'label' => 'Application Link',
				'name' => 'application_link',
				'type' => 'text',
				'instructions' => 'Make sure to include the http://',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_59891c5dd9c79',
							'operator' => '==',
							'value' => '1',
						),
						array (
							'field' => 'field_5989195dd9c6c',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59891931d9c6b',
				'label' => 'Program Topic',
				'name' => 'program_topic',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => 'Entrepreneurship',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_598bcd2865f2c',
				'label' => 'Heading 1',
				'name' => 'heading_1',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_598919b9d9c6d',
				'label' => 'Description 1',
				'name' => 'description_1',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_59891a1ed9c70',
				'label' => 'Image 1',
				'name' => 'image_1',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_598bcd3065f2d',
				'label' => 'Heading 2',
				'name' => 'heading_2',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_598919f3d9c6e',
				'label' => 'Description 2',
				'name' => 'description_2',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_59891a41d9c71',
				'label' => 'Image 2',
				'name' => 'image_2',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_598bcd3765f2e',
				'label' => 'Heading 3',
				'name' => 'heading_3',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59891a12d9c6f',
				'label' => 'Description 3',
				'name' => 'description_3',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_59891a4ed9c72',
				'label' => 'Image 3',
				'name' => 'image_3',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_59891a85d9c73',
				'label' => 'Skills',
				'name' => 'skills',
				'type' => 'textarea',
				'instructions' => 'Put each skill on a new line. For example: 
	Operation of a DSLR
	Adobe Photoshop and Lightroom
	Applying creativity to photography',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 6,
				'formatting' => 'br',
			),
			array (
				'key' => 'field_59891d5f507ad',
				'label' => 'Skills Background Photo',
				'name' => 'skills_background_photo',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_59891af8d9c74',
				'label' => 'Meeting Times',
				'name' => 'meeting_times',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_59891b81d9c75',
				'label' => 'Extra Fee Info',
				'name' => 'extra_fee_info',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_59891dae507ae',
				'label' => 'Extra Eligibility Info',
				'name' => 'extra_eligibility_info',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 4,
				'formatting' => 'br',
			),
			array (
				'key' => 'field_598b4cbc536f7',
				'label' => 'Program Partners',
				'name' => 'program_partners',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'partner',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_598ba9184e56b',
				'label' => 'Syllabus Link',
				'name' => 'syllabus_link',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'program',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
				1 => 'author',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_testimonial-field-group',
		'title' => 'Testimonial Field Group',
		'fields' => array (
			array (
				'key' => 'field_598b37683d9bb',
				'label' => 'Type',
				'name' => 'type',
				'type' => 'radio',
				'required' => 1,
				'choices' => array (
					'Student' => 'Student',
					'Alumni' => 'Alumni',
					'Partner' => 'Partner',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_598b37d03d9bc',
				'label' => 'Headshot',
				'name' => 'headshot',
				'type' => 'image',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_598b37683d9bb',
							'operator' => '==',
							'value' => 'Student',
						),
						array (
							'field' => 'field_598b37683d9bb',
							'operator' => '==',
							'value' => 'Partner',
						),
					),
					'allorany' => 'any',
				),
				'save_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_598b38153d9be',
				'label' => 'Partner Logo',
				'name' => 'logo',
				'type' => 'image',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_598b37683d9bb',
							'operator' => '==',
							'value' => 'Partner',
						),
					),
					'allorany' => 'any',
				),
				'save_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_598b38c63d9bf',
				'label' => 'Testimonial',
				'name' => 'testimonial',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_598b38d83d9c0',
				'label' => 'Testimonial Category',
				'name' => 'testimonial_category',
				'type' => 'checkbox',
				'choices' => array (
					'General' => 'General',
					'Program' => 'Program',
					'Trip' => 'Trip',
					'Launch' => 'Launch',
					'Community' => 'Community',
					'Network' => 'Network',
					'Career' => 'Career',
					'Skills' => 'Skills',
					'Talent' => 'Talent',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_598b39293d9c1',
				'label' => 'Related Program',
				'name' => 'related_program',
				'type' => 'relationship',
				'instructions' => 'Select any/all programs this testimonial is related to. If it\'s not related to any, skip this section.',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'program',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_598b396e3d9c2',
				'label' => 'Related Launch Track',
				'name' => 'related_launch_track',
				'type' => 'relationship',
				'instructions' => 'Select any/all Launch tracks this testimonial is related to. If it\'s not related to any, or its related to all Launch tracks, skip this section.',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_598b38d83d9c0',
							'operator' => '==',
							'value' => 'Launch',
						),
					),
					'allorany' => 'all',
				),
				'return_format' => 'object',
				'post_type' => array (
					0 => 'launch-track',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_598b3a663d9c3',
				'label' => 'Narrative Outcome',
				'name' => 'narrative_outcome',
				'type' => 'textarea',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_598b37683d9bb',
							'operator' => '==',
							'value' => 'Student',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_598b3ae03d9c7',
				'label' => 'Partners Student Has Worked With',
				'name' => 'partners_student_has_worked_with',
				'type' => 'relationship',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_598b37683d9bb',
							'operator' => '==',
							'value' => 'Student',
						),
					),
					'allorany' => 'all',
				),
				'return_format' => 'object',
				'post_type' => array (
					0 => 'partner',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_598badb5e331a',
				'label' => 'Student Work Image',
				'name' => 'student_work_image',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_598badcae331b',
				'label' => 'Student Work Link',
				'name' => 'student_work_link',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'testimonial',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'custom_fields',
				3 => 'discussion',
				4 => 'comments',
				5 => 'author',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_user-field-group',
		'title' => 'User Field Group',
		'fields' => array (
			array (
				'key' => 'field_5988b04eba847',
				'label' => 'Active',
				'name' => 'active',
				'type' => 'true_false',
				'required' => 1,
				'message' => '',
				'default_value' => 1,
			),
			array (
				'key' => 'field_5988b01dba846',
				'label' => 'Headshot',
				'name' => 'headshot',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5988b396ba850',
				'label' => 'Title',
				'name' => 'title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5988b09bba848',
				'label' => 'User Type',
				'name' => 'user_type',
				'type' => 'select',
				'choices' => array (
					'leadership' => 'Leadership',
					'guest' => 'Guest',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5988b126ba849',
				'label' => 'Leadership Team(s)',
				'name' => 'leadership_teams',
				'type' => 'select',
				'choices' => array (
					'board' => 'Board of Directors',
					'director' => 'Directors',
					'program' => 'Program Team',
					'community' => 'Community Team',
					'marketing' => 'Marketing Team',
					'mentorship' => 'Mentorship Team',
					'analytics' => 'Analytics Team',
					'public_events' => 'Public Events Team',
					'alumni_relations' => 'Alumni Relations Team',
					'house' => 'House Team',
					'launch' => 'Launch Team',
					'trips' => 'Trips Team',
					'pioneer' => 'Pioneer Team',
					'tech' => 'Tech Team',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 1,
			),
			array (
				'key' => 'field_5988b436ba851',
				'label' => 'Leadership Type',
				'name' => 'leadership_type',
				'type' => 'select',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5988b09bba848',
							'operator' => '==',
							'value' => 'leadership',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'board_member' => 'Board Member',
					'director' => 'Director',
					'manager' => 'Manager',
					'launch_instructor' => 'Launch Instructor',
					'program_lead' => 'Program Lead',
					'coordinator' => 'Coordinator',
					'ta' => 'TA or Assistant Instructor',
					'producer' => 'Pioneer Producer',
					'advisor' => 'Advisor',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5988b22eba84b',
				'label' => 'Program Team(s)',
				'name' => 'program_teams',
				'type' => 'post_object',
				'instructions' => 'Please select which program team(s) you are on. (This is NOT what programs you\'ve completed - this is if you are a current Program Lead or TA for a program.',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5988b04eba847',
							'operator' => '==',
							'value' => '1',
						),
						array (
							'field' => 'field_5988b126ba849',
							'operator' => '==',
							'value' => 'program',
						),
					),
					'allorany' => 'all',
				),
				'post_type' => array (
					0 => 'program',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'allow_null' => 0,
				'multiple' => 1,
			),
			array (
				'key' => 'field_5988b70ed29ac',
				'label' => 'Trip Team',
				'name' => 'trip_team',
				'type' => 'relationship',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5988b04eba847',
							'operator' => '==',
							'value' => '1',
						),
						array (
							'field' => 'field_5988b126ba849',
							'operator' => '==',
							'value' => 'trips',
						),
					),
					'allorany' => 'all',
				),
				'return_format' => 'id',
				'post_type' => array (
					0 => 'trip',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_5988b2d4ba84d',
				'label' => 'LinkedIn Link',
				'name' => 'linkedin',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5988b2f1ba84e',
				'label' => 'Twitter Profile',
				'name' => 'twitter_profile',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5988b318ba84f',
				'label' => 'Graduating Year',
				'name' => 'graduating_year',
				'type' => 'date_picker',
				'instructions' => 'Please select the month and year of your graduation. (The specific day doesn\'t matter.) ',
				'date_format' => 'yymm',
				'display_format' => 'mm/yy',
				'first_day' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'ef_user',
					'operator' => '==',
					'value' => 'all',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_launch-track-field-group',
		'title' => 'Launch Track Field Group',
		'fields' => array (
			array (
				'key' => 'field_598baa58f0d43',
				'label' => 'Track Description',
				'name' => 'track_description',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_598baa9df0d44',
				'label' => 'What You Learn',
				'name' => 'what_you_learn',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_598baaaef0d45',
				'label' => 'What You Walk Away With',
				'name' => 'what_you_walk_away_with',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_598baaebf0d46',
				'label' => '2016 Partners',
				'name' => '2016_partners',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'partner',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_598bab0bf0d47',
				'label' => '2017 Partners',
				'name' => '2017_partners',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'partner',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_title',
					1 => 'post_type',
				),
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'launch-track',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 0,
	));
}

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_trip-field-group',
		'title' => 'Trip Field Group',
		'fields' => array (
			array (
				'key' => 'field_59ab32d812f73',
				'label' => 'Trip Status',
				'name' => 'trip_status',
				'type' => 'true_false',
				'instructions' => 'Check this box if the trip should be shown online, even if applications aren\'t open yet.',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_598b4bbba840d',
				'label' => 'Trip Start Date',
				'name' => 'trip_start_date',
				'type' => 'date_picker',
				'date_format' => 'mmddyy',
				'display_format' => 'mm/dd/yy',
				'first_day' => 0,
			),
			array (
				'key' => 'field_598b4c0aa840e',
				'label' => 'Trip End Date',
				'name' => 'trip_end_date',
				'type' => 'date_picker',
				'date_format' => 'mmddyy',
				'display_format' => 'mm/dd/yy',
				'first_day' => 0,
			),
			array (
				'key' => 'field_59aee3293b4f2',
				'label' => 'Start to End Times',
				'name' => 'start_to_end_times',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_598b4c2fa8410',
				'label' => 'Application Status',
				'name' => 'application_status',
				'type' => 'true_false',
				'instructions' => 'Is the application open?',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_59ab399f0707a',
				'label' => 'Application Open Date',
				'name' => 'application_open_date',
				'type' => 'date_picker',
				'date_format' => 'mmddyy',
				'display_format' => 'mm/dd/yy',
				'first_day' => 0,
			),
			array (
				'key' => 'field_598b4c1ba840f',
				'label' => 'Application Close Date',
				'name' => 'application_close_date',
				'type' => 'date_picker',
				'date_format' => 'mmddyy',
				'display_format' => 'mm/dd/yy',
				'first_day' => 0,
			),
			array (
				'key' => 'field_598b4c43a8411',
				'label' => 'Application Link',
				'name' => 'application_link',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_598b4c58a8412',
				'label' => 'Fee Info',
				'name' => 'fee_info',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_598b4c6da8413',
				'label' => 'Presenting Partners',
				'name' => 'presenting_partners',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'partner',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_598b4ce8d0170',
				'label' => 'Closing Event Title',
				'name' => 'closing_event_title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_598b4cfdd0171',
				'label' => 'Closing Event Description',
				'name' => 'closing_event_description',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_598b4d0dd0172',
				'label' => 'Closing Event Photo',
				'name' => 'closing_event_photo',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_59ad9a65a20c4',
				'label' => 'Trip Picture 1',
				'name' => 'trip_picture_1',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_59ad9a80a20c6',
				'label' => 'Trip Heading 1',
				'name' => 'trip_heading_1',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59ad9a9aa20c8',
				'label' => 'Trip Paragraph 1',
				'name' => 'trip_paragraph_1',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_59ad9a78a20c5',
				'label' => 'Trip Picture 2',
				'name' => 'trip_picture_2',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_59ad9a8fa20c7',
				'label' => 'Trip Heading 2',
				'name' => 'trip_heading_2',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59ad9aa6a20c9',
				'label' => 'Trip Paragraph 2',
				'name' => 'trip_paragraph_2',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'trip',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_trip-track-field-group',
		'title' => 'Trip Track Field Group',
		'fields' => array (
			array (
				'key' => 'field_598baa080b472',
				'label' => 'Track Description',
				'name' => 'track_description',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_598ba97f0b46e',
				'label' => 'Associated Trip',
				'name' => 'associated_trip',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'trip',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_598ba9a10b46f',
				'label' => 'Track Visits',
				'name' => 'track_visits',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'partner',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_598ba9cb0b470',
				'label' => 'Track Sponsors',
				'name' => 'track_sponsors',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'partner',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_598ba9ed0b471',
				'label' => 'Track In-Kind Sponsors',
				'name' => 'track_in_kind_sponsors',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'partner',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_title',
					1 => 'post_type',
				),
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'trip-track',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 0,
	));
}

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_trip-field-group',
		'title' => 'Trip Field Group',
		'fields' => array (
			array (
				'key' => 'field_59aee3293b4f2',
				'label' => 'Start to End Times',
				'name' => 'start_to_end_times',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'trip',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 0,
	));
}

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_pioneer-posts-field-group',
		'title' => 'Pioneer Posts Field Group',
		'fields' => array (
			array (
				'key' => 'field_5a4f8a62d2744',
				'label' => 'Call to Action 1',
				'name' => 'cta_1',
				'type' => 'true_false',
				'message' => 'Select this to enable the first call-to-action.',
				'default_value' => 0,
			),
			array (
				'key' => 'field_5a4f8acfd2746',
				'label' => 'Call to Action 1 Heading',
				'name' => 'cta_h1',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5a4f8a62d2744',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5a4f8b1bd2748',
				'label' => 'Call to Action 1 Link',
				'name' => 'cta_l1',
				'type' => 'text',
				'instructions' => 'Please include the http://',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5a4f8a62d2744',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5a4f905255225',
				'label' => 'Call to Action 1 Link Text',
				'name' => 'cta_lt1',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5a4f8a62d2744',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5a4f8b7cd274a',
				'label' => 'Call to Action 1 Image',
				'name' => 'cta_i1',
				'type' => 'image',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5a4f8a62d2744',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'save_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_5a4f8ac5d2745',
				'label' => 'Call to Action 2',
				'name' => 'cta_2',
				'type' => 'true_false',
				'message' => 'Select this to enable the second call-to-action.',
				'default_value' => 0,
			),
			array (
				'key' => 'field_5a4f8b01d2747',
				'label' => 'Call to Action 2 Heading',
				'name' => 'cta_h2',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5a4f8ac5d2745',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5a4f8b5cd2749',
				'label' => 'Call to Action 2 Link',
				'name' => 'cta_l2',
				'type' => 'text',
				'instructions' => 'Please include the http://',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5a4f8ac5d2745',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5a4f906455226',
				'label' => 'Call to Action 2 Link Text',
				'name' => 'cta_lt2',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5a4f8ac5d2745',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5a4f8b9bd274b',
				'label' => 'Call to Action 2 Image',
				'name' => 'cta_i2',
				'type' => 'image',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5a4f8ac5d2745',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'save_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}


