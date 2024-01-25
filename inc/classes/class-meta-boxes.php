<?php
/**
 * Register meta boxes.
 *
 * @package fresherszone
 */

namespace FRESHERSZONE_THEME\Inc;

use FRESHERSZONE_THEME\Inc\Traits\Singleton;

class FRESHERSZONE_THEME {
	use Singleton;

	protected function __construct() {
		// Load class.
		
		$this->setup_hooks();
	}

	protected function setup_hooks() {

		/**
		 * Actions.
		 */
        add_action('add_meta_boxes', [$this, 'add_custom_meta_box'])
	}
    
	/**
	 * Add custom meta box.
	 *
	 * @return void
	 */
    public function add_custom_meta_box() {
		$screens = [ 'post' ];
		foreach ( $screens as $screen ) {
			add_meta_box(
				'hide-page-title',           // Unique ID
				__( 'Hide page title', 'aquila' ),  // Box title
				[ $this, 'custom_meta_box_html' ],  // Content callback, must be of type callable
				$screen,                   // Post type
				'side' // context
			);
		}
	}
    /**
	 * Custom meta box HTML( for form )
	 *
	 * @param object $post Post.
	 *
	 * @return void
	 */
    public function custom_meta_box_callback_html($post){
        $value = get_post_meta($post->ID, '_hide_page_title', true);
        ?>
        <label for="fresherszone-field"><?php esc_html_e( 'Hide the page title', 'fresherszone' ); ?></label>
		<select name="fresherszone_hide_title_field" id="fresherszone-field" class="postbox">
			<option value=""><?php esc_html_e( 'Select', 'fresherszone' ); ?></option>
			<option value="yes" <?php selected( $value, 'yes' ); ?>>
				<?php esc_html_e( 'Yes', 'fresherszone' ); ?>
			</option>
			<option value="no" <?php selected( $value, 'no' ); ?>>
				<?php esc_html_e( 'No', 'fresherszone' ); ?>
			</option>
		</select>
        <?php
    }
}	