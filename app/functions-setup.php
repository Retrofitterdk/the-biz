<?php
/**
 * Theme setup functions.
 *
 * This file holds basic theme setup functions executed on appropriate hooks
 * with some opinionated priorities based on theme dev, particularly working
 * with child theme devs/users, over the years. I've also decided to use
 * anonymous functions to keep these from being easily unhooked. WordPress has
 * an appropriate API for unregistering, removing, or modifying all of the
 * things in this file. Those APIs should be used instead of attempting to use
 * `remove_action()`.
 *
 * @package   TheBiz
 * @author    Steffen Bang Nielsen <sbn@retrofitter.dk>
 * @copyright 2018 Steffen Bang Nielsen
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://retrofitter.dk
 */

namespace TheBiz;

/**
 * Set up theme support.  This is where calls to `add_theme_support()` happen.
 *
 * @link   https://developer.wordpress.org/reference/functions/add_theme_support/
 * @link   https://developer.wordpress.org/themes/basics/theme-functions/
 * @link   https://developer.wordpress.org/reference/functions/load_theme_textdomain/
 * @link   https://github.com/WordPress/gutenberg/blob/master/docs/extensibility/theme-support.md
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'init', function() {
	remove_filter( 'get_custom_logo', 'Hybrid\custom_logo_class', 5 );
}, 5 );

/**
 * Adds custom classes to the core WP logo.
 *
 * @since  5.0.0
 * @access public
 * @param  string  $logo
 * @return string
 */
function the_biz_custom_logo_class( $logo ) {

	$logo = preg_replace(
		"/(<a.+?)class=(['\"])(.+?)(['\"])/i",
		'$1class=$2site-info__logo-link $3$4',
		$logo,
		1
	);

	return preg_replace(
		"/(<img.+?)class=(['\"])(.+?)(['\"])/i",
		'$1class=$2site-info__logo $3$4',
		$logo,
		1
	);
}
add_filter( 'get_custom_logo', __NAMESPACE__ . '\the_biz_custom_logo_class', 5 );


add_action( 'after_setup_theme', function() {

	// Sets the theme content width. This variable is also set in the
	// `resources/scss/settings/_dimensions.scss` file.
	$GLOBALS['content_width'] = 1240;

	// Load theme translations.
	load_theme_textdomain( 'the-biz', get_parent_theme_file_path( 'resources/lang' ) );

	// Automatically add the `<title>` tag.
	add_theme_support( 'title-tag' );

	// Automatically add feed links to `<head>`.
	add_theme_support( 'automatic-feed-links' );

	// Adds featured image support.
	add_theme_support( 'post-thumbnails' );

	// Adds post format support.
    add_theme_support( 'post-formats', array( 'video', 'gallery' ) );

	// Add selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Wide and full alignment. The styles for alignment is housed in the
	// `resources/scss/utilities/_alignment.scss` file.
	add_theme_support( 'align-wide' );

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	// Add support for the Custom Content Portfolio plugin
	add_theme_support( 'custom-content-portfolio' );

	// Outputs HTML5 markup for core features.
	add_theme_support( 'html5', [
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form'
	] );

	// Add custom logo support.
	add_theme_support( 'custom-logo', [
		'width'       => null,
		'height'      => null,
		'flex-width'  => true,
		'flex-height' => true,
		'header-text' => 'app-header__title'
	] );
	// Disable custom colors in block Color Palettes
	add_theme_support( 'disable-custom-colors' );

	// Editor color palette. These colors are also defined in the
	// Palette generated by Material Palette - materialpalette.com/red/grey
	// `resources/scss/settings/_colors.scss` file.
	add_theme_support( 'editor-color-palette', [
		[
			'name'  => __( 'Primary', 'the-biz' ),
			'slug'  => 'theme-primary',
			'color' => '#d32f2f'
		],
		[
			'name'  => __( 'Secondary', 'the-biz' ),
			'slug'  => 'theme-secondary',
			'color' => '#e9e9e9',
		],
		[
			'name'  => __( 'Red', 'the-biz' ),
			'slug'  => 'theme-red',
			'color' => '#f44336',
		],
		[
			'name'  => __( 'Black', 'the-biz' ),
			'slug'  => 'theme-black',
			'color' => '#212121',
		],
		[
			'name'  => __( 'Grey', 'the-biz' ),
			'slug'  => 'theme-grey',
			'color' => '#757575',
		],
		[
			'name'  => __( 'White', 'the-biz' ),
			'slug'  => 'theme-white',
			'color' => '#ffffff',
		],
		[
			'name'  => __( 'Light pink', 'the-biz' ),
			'slug'  => 'custom-pink',
			'color' => '#ffcdd2',
		],
		[
			'name'  => __( 'Light grey', 'the-biz' ),
			'slug'  => 'custom-grey',
			'color' => '#bdbdbd',
		],
	] );

	// Disable custom font sizes
	add_theme_support('disable-custom-font-sizes');

	// Editor block font sizes. These font sizes are also defined in the
	// `resources/scss/settings/_fonts.scss` file.
	add_theme_support( 'editor-font-sizes', [
		[
			'name'      => __( 'Small', 'the-biz' ),
			'shortName' => __( 'S', 'the-biz' ),
			'size'      => 12,
			'slug'      => 'small'
		],
		[
			'name'      => __( 'Regular', 'the-biz' ),
			'shortName' => __( 'M', 'the-biz' ),
			'size'      => 16,
			'slug'      => 'regular'
		],
		[
			'name'      => __( 'Large', 'the-biz' ),
			'shortName' => __( 'L', 'the-biz' ),
			'size'      => 36,
			'slug'      => 'large'
		],
		[
			'name'      => __( 'Larger', 'the-biz' ),
			'shortName' => __( 'XL', 'the-biz' ),
			'size'      => 48,
			'slug'      => 'larger'
		]
	] );

}, 5 );

/**
 * Adds support for the custom background feature. This is in its own function
 * hooked to `after_setup_theme` so that we can give it a later priority.  This
 * is so that child themes can more easily overwrite this feature.  Note that
 * overwriting the background should be done *before* rather than after.
 *
 * @link   https://developer.wordpress.org/reference/functions/add_theme_support/#custom-background
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'after_setup_theme', function() {

	add_theme_support( 'custom-background', [
		'default-image'          => '',
		'default-preset'         => 'default',
		'default-position-x'     => 'left',
		'default-position-y'     => 'top',
		'default-size'           => 'auto',
		'default-repeat'         => 'repeat',
		'default-attachment'     => 'scroll',
		'default-color'          => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	] );

}, 15 );

/**
 * Adds support for the custom header feature. This is in its own function
 * hooked to `after_setup_theme` so that we can give it a later priority.  This
 * is so that child themes can more easily overwrite this feature.  Note that
 * overwriting the header should be done *before* rather than after.
 *
 * @link   https://developer.wordpress.org/reference/functions/add_theme_support/#custom-header
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'after_setup_theme', function() {

	add_theme_support( 'custom-header', [
		'default-image'          => '',
		'random-default'         => false,
		'width'                  => 2000,
		'height'                 => 450,
		'flex-height'            => false,
		'flex-width'             => false,
		'default-text-color'     => '',
		'header-text'            => true,
		'uploads'                => true,
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
		'video'                  => false,
		'video-active-callback'  => 'is_front_page'
	] );

}, 15 );

/**
 * Register menus.
 *
 * @link   https://developer.wordpress.org/reference/functions/register_nav_menus/
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'init', function() {

	register_nav_menus( [
		'primary' => esc_html_x( 'Primary', 'nav menu location', 'the-biz' ),
		'featured' => esc_html_x( 'Featured', 'nav menu location', 'the-biz' ),
		'social'  => esc_html_x( 'Social menu', 'nav menu location', 'the-biz')
	] );

}, 5 );

/**
 * Register image sizes. Even if adding no custom image sizes or not adding
 * "thumbnails," it's still important to call `set_post_thumbnail_size()` so
 * that plugins that utilize the `post-thumbnail` size will have a properly-sized
 * thumbnail that matches the theme design.
 *
 * @link   https://developer.wordpress.org/reference/functions/set_post_thumbnail_size/
 * @link   https://developer.wordpress.org/reference/functions/add_image_size/
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'init', function() {

	// Set the `post-thumbnail` size.
	set_post_thumbnail_size( 560, 560, true );

	// Register custom image sizes.
	add_image_size( 'widget', 360, 360 );
	add_image_size( 'content', 880, 880 );
	add_image_size( 'wide', 1600, 1600 );

}, 5 );

function choose_new_image_sizes($sizes) {
    return array_merge( $sizes, array(
		'widget' => __('Widget', 'the-biz'),
		'content' => __('Content width', 'the-biz'),
        'wide' => __('Wide', 'the-biz' ),
    ) );
}
add_filter( 'image_size_names_choose', __NAMESPACE__ . '\choose_new_image_sizes' );


/**
 * Register sidebars.
 *
 * @link   https://developer.wordpress.org/reference/functions/register_sidebar/
 * @link   https://developer.wordpress.org/reference/functions/register_sidebars/
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'widgets_init', function() {

	$args = [
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget__title">',
		'after_title'   => '</h3>'
	];

	register_sidebar( [
		'id'   => 'primary',
		'name' => esc_html_x( 'Primary', 'sidebar', 'the-biz' )
	] + $args );

}, 5 );

// Adds classes conditionally to body tag
function body_classes( $classes ) {
	$hidesitedesc = get_theme_mod( 'hide_site_description' );
	// Adds a class of no-sidebar when there is no sidebar present.
	if ( is_home() ) {
		$classes[] = 'blog';
	} elseif ( is_front_page() ) {
		$classes[] = 'frontpage';
	}
	if ( has_custom_logo() ) {
		$classes[] = 'has-custom-logo';
	}
	if ( is_singular() ) {
		// Adds `singular` to singular pages.
		$classes[] = 'singular';
	} else {
		// Adds `hfeed` to non singular pages.
		$classes[] = 'hfeed';
	}
	$grid = get_theme_mod( 'two_column_grid' );
	if ( $grid ) {
		$classes[] = 'two-columns';
	}
	if ( is_active_sidebar( 'primary' ) ) {
		$classes[] = 'has-sidebar';
	} else {
		$classes[] = 'no-sidebar';
	}
	if ( !display_header_text() ) {
		$classes[] = 'hide-site-title hide-site-description';
	} elseif ( $hidesitedesc ) {
		$classes[] = 'hide-site-description';
		}
	$logoalignment = get_theme_mod( 'app_header_alignment' );
		if ( $logoalignment ) {
		$classes[] = $logoalignment;
		}
	return $classes;
	}
	add_filter( 'body_class', __NAMESPACE__ . '\body_classes' );

function change_blogname_delimiter( $delimiter ){
	$delimiter = '-';
	return $delimiter;
}
// add_filter( 'biz_info_change_delimiter', __NAMESPACE__ . '\change_blogname_delimiter', 10, 2 );
