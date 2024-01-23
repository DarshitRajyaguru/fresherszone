<?php
/**
 * Enqueue theme assets
 * 
 * @package fresherszone
 */

 namespace FRESHERSZONE_THEME\Inc;

 use FRESHERSZONE_THEME\Inc\Traits\Singleton;
 class assets{
    use Singleton;

    protected function __construct(){
        Assets::get_instance();
		Menus::get_instance();
		
        $this->setup_hooks();
    }
    protected function setup_hook(){
        /**
		 * Actions.
		 */
        add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );
		add_action('wp_enqueue_scripts', [ $this, 'fz_enqueue_scripts']);
    }
    public function register_styles(){
		wp_enqueue_style('custom-stylesheet', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');
    	// wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/assets/src/library/css/bootstrap.min.css', array(), '1.0.0', 'all');
		// wp_enqueue_style('slick-style', get_template_directory_uri() . '/assets/build/library/css/slick.css', array(), '1.0.0', 'all');
		// wp_enqueue_style('slick-theme-style', get_template_directory_uri() . '/assets/build/library/css/slick-theme.css', array(), '1.0.0', 'all');
	}

	public function register_scripts(){
		wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/main.js', array('jquery'), '1.0', true);
    	// wp_enqueue_script('bootstrap-script', get_template_directory_uri() . '/assets/src/library/js/bootstrap.min.js', array('jquery'),'1.0', true);
    	// wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/assets/src/library/js/bootstrap.bundle.min.js', array('jquery'), '1.0', true);
		// wp_enqueue_script('slick-script', get_template_directory_uri() . '/assets/build/library/js/slick.min.css', array('jquery'), '1.0', true);
	}
 }