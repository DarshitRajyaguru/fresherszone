<?php
/**
 * Bootstraps the Theme.
 *
 * @package fresherszone
 */

namespace FRESHERSZONE_THEME\Inc;

use FRESHERSZONE_THEME\Inc\Traits\Singleton;

class FRESHERSZONE_THEME {
	use Singleton;

	protected function __construct() {
		wp_die('Hello');
		// Load class.
		Assets::get_instance();
		Menus::get_instance();
		// Meta_Boxes::get_instance();
		// Sidebars::get_instance();
		// Blocks::get_instance();
		// Block_Patterns::get_instance();
		// Loadmore_Posts::get_instance();
		// Loadmore_Single::get_instance();
		// Register_Post_Types::get_instance();
		// Register_Taxonomies::get_instance();
		// Archive_Settings::get_instance();

		$this->setup_hooks();
	}

	protected function setup_hooks() {

		/**
		 * Actions.
		 */
		add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );

	}

	public function setup_theme(){
		/**
		 * Get the Site title
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add custom logo for the site
		 */
		add_theme_support( 'custom-logo' , array(
			'header-text'	=> array('site-tile', 'site-description'),
			'height'		=> '480',
			'width'			=> '720',
			'flex-height'	=> true,
			'flex-width'	=> true
		));
	}

	