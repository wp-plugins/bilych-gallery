<?php

/**
 * The dashboard-specific functionality of the plugin.
 *
 * @link       http://rbilych.github.io
 * @since      1.0.0
 *
 * @package    Bilych_Gallery
 * @subpackage Bilych_Gallery/admin
 */

/**
 * The dashboard-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    Bilych_Gallery
 * @subpackage Bilych_Gallery/admin
 * @author     Ruslan Bilych <r.bilych@gmail.com>
 */
class Bilych_Gallery_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $bilych_gallery    The ID of this plugin.
	 */
	private $bilych_gallery;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $bilych_gallery       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $bilych_gallery, $version ) {

		$this->bilych_gallery = $bilych_gallery;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the Dashboard.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->bilych_gallery, plugin_dir_url( __FILE__ ) . 'css/bilych-gallery-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Create settings menu in dashboard
	 *
	 * @since    1.0.0
	 */
	public function create_settings_submenu() {

		add_options_page( 'Bilych Gallery Settings', 'Bilych Gallery', 'manage_options', 'bilych-gallery-settings', array( $this, 'display_settings_page' ) );

	}

	/**
	 * Show settings page
	 *
	 * @since    1.0.0
	 */
	public function display_settings_page() {

		?>
		<div class="wrap">
			<h2>Bilych Gallery Settings</h2>
			<form action='options.php' method='post'>
				<?php settings_fields( 'bilych_gallery_options' ); ?>
				<?php do_settings_sections( __FILE__ ); ?>
				<?php submit_button(); ?>
			</form>
		</div>
		<?php

	}

	/**
	 * Register settings and fields
	 *
	 * @since    1.0.0
	 */
	public function register_setting_and_fields() {

		register_setting( 'bilych_gallery_options', 'bilych_gallery_options' );

		add_settings_section( 'bilych_gallery_main_section', __('Gallery Style'), array( $this, 'bilych_gallery_main_section_cb' ), __FILE__ );

		add_settings_field( 'bilych_gallery_type', __('Choose Style:'), array( $this, 'bilych_gallery_type_setting' ), __FILE__, 'bilych_gallery_main_section' );

	}

	/**
	 * Callback function from add_setting_section
	 *
	 * @since    1.0.0
	 */
	public function bilych_gallery_main_section_cb() {
		// not used
	}

	/**
	 * Display admin options
	 *
	 * @since    1.0.0
	 */
	public function bilych_gallery_type_setting() {
		require plugin_dir_path( __FILE__ ) . 'partials/bilych-gallery-admin-display.php';
	}

}
