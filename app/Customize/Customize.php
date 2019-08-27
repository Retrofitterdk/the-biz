<?php
/**
 * Customize class.
 *
 * This file shows some basics on how to set up and work with the WordPress
 * Customization API. This is the place to set up all of your theme options for
 * the customizer.
 *
 * @package   TheBiz
 * @author    Steffen Bang Nielsen <sbn@retrofitter.dk>
 * @copyright 2018 Steffen Bang Nielsen
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://retrofitter.dk
 */

namespace TheBiz\Customize;

use WP_Customize_Manager;
use Hybrid\Contracts\Bootable;
use function TheBiz\asset;

/**
 * Handles setting up everything we need for the customizer.
 *
 * @link   https://developer.wordpress.org/themes/customize-api
 * @since  1.0.0
 * @access public
 */
class Customize implements Bootable {

	/**
	 * Adds actions on the appropriate customize action hooks.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', [ $this, 'registerPanels'   ] );
		add_action( 'customize_register', [ $this, 'registerSections' ] );
		add_action( 'customize_register', [ $this, 'registerSettings' ] );
		add_action( 'customize_register', [ $this, 'registerControls' ] );
		add_action( 'customize_register', [ $this, 'registerPartials' ] );

		// Enqueue scripts and styles.
		add_action( 'customize_controls_enqueue_scripts', [ $this, 'controlsEnqueue'] );
		add_action( 'customize_preview_init', [ $this, 'previewEnqueue' ] );
	}

	/**
	 * Callback for registering panels.
	 *
	 * @link   https://developer.wordpress.org/themes/customize-api/customizer-objects/#panels
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager  Instance of the customize manager.
	 * @return void
	 */
	public function registerPanels( WP_Customize_Manager $manager ) {}

	/**
	 * Callback for registering sections.
	 *
	 * @link   https://developer.wordpress.org/themes/customize-api/customizer-objects/#sections
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager  Instance of the customize manager.
	 * @return void
	 */
	public function registerSections( WP_Customize_Manager $manager ) {
		// Add layout section.
		$manager->add_section( 'layout', [
			'title'    => __( 'Layout',  'the-biz' ),
			'priority' => 20
		] );
	}

	/**
	 * Callback for registering settings.
	 *
	 * @link   https://developer.wordpress.org/themes/customize-api/customizer-objects/#settings
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager  Instance of the customize manager.
	 * @return void
	 */
	public function registerSettings( WP_Customize_Manager $manager ) {

		// Update the `transform` property of core WP settings.
		$settings = [
			$manager->get_setting( 'blogname' ),
			$manager->get_setting( 'blogdescription' ),
			$manager->get_setting( 'header_textcolor' ),
			$manager->get_setting( 'header_image' ),
			$manager->get_setting( 'header_image_data' )
		];

		array_walk( $settings, function( &$setting ) {
			$setting->transport = 'postMessage';
		} );

		// Register the site title/site description settings.
		$manager->add_setting( 'hide_site_title', [
			'default'           => false,
			'sanitize_callback' => 'wp_validate_boolean',
			'transport'         => 'postMessage'
		] );
		$manager->add_setting( 'hide_site_description', [
			'default'           => false,
			'sanitize_callback' => 'wp_validate_boolean',
			'transport'         => 'postMessage'
		] );

		// Register the column/grid settings.
		$manager->add_setting( 'two_column_grid', [
			'default'           => false,
			'sanitize_callback' => 'wp_validate_boolean',
			'transport'         => 'postMessage'
		] );

		// Register logo alignment settings.
		$manager->add_setting( 'app_header_alignment', [
			'default'           => 'alignleft',
			'sanitize_callback' => 'sanitize_text_field',
            'type'              => 'theme_mod',
            'capability'        => 'edit_theme_options'
		] );
	}

	/**
	 * Callback for registering controls.
	 *
	 * @link   https://developer.wordpress.org/themes/customize-api/customizer-objects/#controls
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager  Instance of the customize manager.
	 * @return void
	 */
	public function registerControls( WP_Customize_Manager $manager ) {
		// Register the site title/site description controls.
		$manager->add_control( 'hide_site_description', [
			'label'    		=> __( 'Show only site title, not site description .', 'the-biz' ),
			'section'  		=> 'title_tagline',
            'settings'      => 'hide_site_description',
			'type'     		=> 'checkbox',
			'priority'      => 45
		] );
		$manager->add_control( 'hide_site_title', [
			'label'    		=> __( 'Show only site description, not site title .', 'the-biz' ),
			'section'  		=> 'title_tagline',
            'settings'      => 'hide_site_title',
			'type'     		=> 'checkbox',
			'priority'      => 50
		] );

		// Register the column/grid controls.
		$manager->add_control( 'two_column_grid', [
			'label'    		=> __( 'Use two column grid in desktop view, when sidebar is active.', 'the-biz' ),
			'section'  		=> 'layout',
            'settings'      => 'two_column_grid',
			'type'     		=> 'checkbox',
			'priority'      => 10
		] );

		// Register the logo alignment control.
		$manager->add_control( 'app_header_alignment', [
            'label'         => __( 'Logo alignment', 'the-biz' ),
            'description'   => __( 'Select alignment for logo or title in header', 'the-biz' ),
			'section'       => 'layout',
            'settings'      => 'app_header_alignment',
            'type'          => 'radio',
            'choices'       => array(
                                'logoleft'   => __( 'Left', 'the-biz' ),
                                'logocenter'  => __( 'Center', 'the-biz' ),
                                'logoright'  => __( 'Right', 'the-biz' )
                                ),
			'priority'      => 20
		] );
	}

	/**
	 * Callback for registering partials.
	 *
	 * @link   https://developer.wordpress.org/themes/customize-api/tools-for-improved-user-experience/#selective-refresh-fast-accurate-updates
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager  Instance of the customize manager.
	 * @return void
	 */
	public function registerPartials( WP_Customize_Manager $manager ) {

		// If the selective refresh component is not available, bail.
		if ( ! isset( $manager->selective_refresh ) ) {
			return;
		}

		// Selectively refreshes the title in the header when the core
		// WP `blogname` setting changes.
		$manager->selective_refresh->add_partial( 'blogname', [
			'selector'        => '.app-header__title-link',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			}
		] );

		// Selectively refreshes the description in the header when the
		// core WP `blogdescription` setting changes.
		$manager->selective_refresh->add_partial( 'blogdescription', [
			'selector'        => '.app-header__description',
			'render_callback' => function() {
				return get_bloginfo( 'description', 'display' );
			}
		] );

		// Selectively refreshes the custom header if it doesn't support
		// videos. Core WP won't properly refresh output from its own
		// `the_custom_header_markup()` function unless video is supported.
		if ( ! current_theme_supports( 'custom-header', 'video' ) ) {

			$manager->selective_refresh->add_partial( 'header_image', [
				'selector'            => '#wp-custom-header',
				'render_callback'     => 'the_custom_header_markup',
				'container_inclusive' => true,
			] );
		}
	}

	/**
	 * Register or enqueue scripts/styles for the controls that are output
	 * in the controls frame.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function controlsEnqueue() {

		wp_enqueue_script(
			'the-biz-customize-controls',
			asset( 'js/customize-controls.js' ),
			[ 'customize-controls' ],
			null,
			true
		);

		wp_enqueue_style(
			'the-biz-customize-controls',
			asset( 'css/customize-controls.css' ),
			[],
			null
		);
	}

	/**
	 * Register or enqueue scripts/styles for the live preview frame.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function previewEnqueue() {

		wp_enqueue_script(
			'the-biz-customize-preview',
			asset( 'js/customize-preview.js' ),
			[ 'customize-preview' ],
			null,
			true
		);
	}
}
