<?php
/**
 * The Glendale Apartments functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package The_Glendale
 */

if ( ! function_exists( 'glendale_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function glendale_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on The Glendale Apartments, use a find and replace
	 * to change 'glendale' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'glendale', get_template_directory() . '/languages' );

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
        add_image_size( 'home-feature', 1200, 550, TRUE );
	    add_image_size( 'featured-image', 1200, 420, TRUE );
	    add_image_size( 'sidebar-image', 100, 100, TRUE );
        add_image_size( 'floor-plan-image', 900, 9999, FALSE );
        add_image_size( 'gallery-image', 300, 300, TRUE );

	// This theme uses wp_nav_menu() in one location.
	   register_nav_menus( array(
            'menu-1' => esc_html__( 'Primary', 'glendale' ),
            'menu-2' => esc_html__( 'Mobile', 'glendale' )
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
	add_theme_support( 'custom-background', apply_filters( 'glendale_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'glendale_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function glendale_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'glendale_content_width', 640 );
}
add_action( 'after_setup_theme', 'glendale_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function glendale_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'glendale' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'glendale' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'glendale_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function glendale_scripts() {
	wp_enqueue_style( 'glendale-style', get_stylesheet_uri() );

	wp_deregister_script('jquery');
	//         // Load the copy of jQuery that comes with WordPress
	//         // The last parameter set to TRUE states that it should be loaded in the footer.
	wp_register_script('jquery', '/wp-includes/js/jquery/jquery.js', FALSE, FALSE, TRUE);

	wp_enqueue_script( 'glendale-navigation', get_template_directory_uri() . '/js/min/mobile-menu-min.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'glendale-skip-link-focus-fix', get_template_directory_uri() . '/js/min/skip-link-focus-fix-min.js', array(), '20151215', true );

	if ( is_page_template( 'page-contact.php' ) ) {

        wp_enqueue_script( 'glendale-contact-directions-map', get_template_directory_uri() . '/js/min/map-directions-min.js', array(), false, true );
    }

    if ( is_page_template( 'page-amenities.php' ) ) {

		wp_enqueue_script( 'glendale-features-amenities', get_template_directory_uri() . '/js/min/features-amenities-min.js', array(), false, true );
	}

    // if ( is_page_template( 'page-floorplans.php' ) ) {

    //     wp_enqueue_script( 'glendale-floorplans', get_template_directory_uri() . '/js/min/floorplans-min.js', array('jquery'), false, true );
    // }

	if ( is_page_template( 'page-floorplans.php' )  || is_page_template( 'page-photo-gallery.php' ) ) {

		wp_enqueue_script( 'glendale-imagelightbox', get_template_directory_uri() . '/js/min/imagelightbox-min.js', array('jquery'), false, true );

		wp_enqueue_script( 'glendale-lightbox', get_template_directory_uri() . '/js/min/lightbox-min.js', array('glendale-imagelightbox'), false, true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'glendale_scripts' );

/**
 * Custom ACF Options
 */
if( function_exists('acf_add_options_page') ) {
	// Company Information Section
    acf_add_options_page(array(
        'page_title'    => 'Global Settings',
        'menu_title'    => 'Global Website Information',
        'menu_slug'     => 'global-info',
        'icon_url'   	=> 'dashicons-phone',
        'capability'    => 'edit_posts',
        'redirect'      => true
    ));

    	acf_add_options_sub_page(array(
    	    'page_title'    => 'Contact Information',
    	    'menu_title'    => 'Contact Info',
    	    'menu_slug'     => 'contact-info',
    	    'parent_slug'   => 'global-info',
    	));

    // Specials Section
    acf_add_options_page(array(
        'page_title'    => 'Specials Settings',
        'menu_title'    => 'Specials',
        'menu_slug'     => 'specials',
        'icon_url'      => 'dashicons-tag',
        'capability'    => 'edit_posts',
        'redirect'      => true,
        'position'      => 20
    ));

    	acf_add_options_sub_page(array(
    	    'page_title'    => 'Sidebar Information',
    	    'menu_title'    => 'Sidebar',
    	    'menu_slug'     => 'sidebar',
    	    'parent_slug'   => 'specials'
    	));

    // Floorplan Section
    acf_add_options_page(array(
        'page_title'    => 'Floorplans Settings',
        'menu_title'    => 'Floorplans',
        'menu_slug'     => 'floorplans',
        'icon_url'      => 'dashicons-building',
        'capability'    => 'edit_posts',
        'redirect'      => true,
        'position'      => 21
    ));

    	acf_add_options_sub_page(array(
    	    'page_title'    => 'One Bedroom Floorplans Section',
    	    'menu_title'    => 'One Bedroom',
    	    'menu_slug'     => 'one_bedroom_floorplan',
    	    'parent_slug'   => 'floorplans'
    	));

    	acf_add_options_sub_page(array(
    	    'page_title'    => 'Two Bedroom Floorplans Section',
    	    'menu_title'    => 'Two Bedroom',
    	    'menu_slug'     => 'two_bedroom_floorplan',
    	    'parent_slug'   => 'floorplans'
    	));

    	acf_add_options_sub_page(array(
    	    'page_title'    => 'Three Bedroom Floorplans Section',
    	    'menu_title'    => 'Three Bedroom',
    	    'menu_slug'     => 'three_bedroom_floorplan',
    	    'parent_slug'   => 'floorplans'
    	));
}

/**
 * Custom Post Type configuration for Landmarks
 */

function glendale_create_custom_posts() {
	$labels = array(
		'name'                  => _x( 'Area Landmarks', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Area Landmark', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Area Landmarks', 'text_domain' ),
		'name_admin_bar'        => __( 'Area Landmarks', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Landmarks', 'text_domain' ),
		'add_new_item'          => __( 'Add New Landmark', 'text_domain' ),
		'add_new'               => __( 'Add New Landmark', 'text_domain' ),
		'new_item'              => __( 'New Landmark', 'text_domain' ),
		'edit_item'             => __( 'Edit Landmark', 'text_domain' ),
		'update_item'           => __( 'Update Landmark', 'text_domain' ),
		'view_item'             => __( 'View Landmark', 'text_domain' ),
		'search_items'          => __( 'Search Landmarks', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Area Landmark', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'revisions', ),
		'taxonomies'            => array( 'landmark_types' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 22,
		'menu_icon'             => 'dashicons-location',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'			=> true,
	);
	register_post_type( 'area_landmarks', $args );

}
add_action( 'init', 'glendale_create_custom_posts', 0 );

function glendale_create_custom_taxonomies() {
	$labels = array(
		'name'                       => _x( 'Landmark Types', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Landmark Type', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Landmark Types', 'text_domain' ),
		'all_items'                  => __( 'All Landmark Types', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Landmark Type', 'text_domain' ),
		'add_new_item'               => __( 'Add New Landmark Type', 'text_domain' ),
		'edit_item'                  => __( 'Edit Landmark Type', 'text_domain' ),
		'update_item'                => __( 'Update Landmark Type', 'text_domain' ),
		'view_item'                  => __( 'View Landmark Type', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'show_in_rest'				 => true,
	);
	register_taxonomy( 'landmark_types', array( 'area_landmarks' ), $args );

}
add_action( 'init', 'glendale_create_custom_taxonomies', 0 );

// Remove option for no type from radio button for taxonomies plugin
add_filter('radio-buttons-for-taxonomies-no-term-landmark_types', '__return_FALSE' );

/**
 * INCLUDE PLUGINS
 */

include_once( get_stylesheet_directory() . '/plugins/mm4-you-contact-form/mm4-you-cf.php' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load sidebar content for the homepage sidebar file.
 */
require get_template_directory() . '/inc/homepage-sidebar.php';

/**
 * Load sidebar content for the specials section.
 */
require get_template_directory() . '/inc/specials-sidebar.php';

/**
 * Loads the taglines.
 */
require get_template_directory() . '/inc/content-tagline.php';

/**
 * Loads the floorplans.
 */
require get_template_directory() . '/inc/floorplans.php';

/**
 * Loads the contact content.
 */
require get_template_directory() . '/inc/contact-page-content.php';

/**
 * Loads the community list info.
 */
require get_template_directory() . '/inc/community-page-list.php';

/**
 * Loads the community page map.
 */
require get_template_directory() . '/inc/community-page-map.php';

/**
 * Loads the photo gallery.
 */
require get_template_directory() . '/inc/photo-gallery.php';

/**
 * Loads the custom featured image.
 */
require get_template_directory() . '/inc/featured-image.php';

/**
 * Displays the apartment features section.
 */
require get_template_directory() . '/inc/features.php';

/**
 * Displays the apartment amenities section.
 */
require get_template_directory() . '/inc/amenities.php';

/**
 * Displays apartment availability.
 */
require get_template_directory() . '/inc/apartment-availability.php';



