<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://rbilych.github.io
 * @since      1.0.0
 *
 * @package    Bilych_Gallery
 * @subpackage Bilych_Gallery/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    Bilych_Gallery
 * @subpackage Bilych_Gallery/public
 * @author     Ruslan Bilych <r.bilych@gmail.com>
 */
class Bilych_Gallery_Public {

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
	 * @param      string    $bilych_gallery       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $bilych_gallery, $version ) {

		$this->bilych_gallery = $bilych_gallery;
		$this->version = $version;

		$this->replace_default_gallery();

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->bilych_gallery, plugin_dir_url( __FILE__ ) . 'css/' . $this->get_current_gallery_name() . '.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		// Define dependencies
		if( $this->get_current_gallery_name() == 'photopile' ) {
			$deps = array( 'jquery', 'jquery-ui-dialog' );
		} else {
			$deps = array( 'jquery' );
		}

		wp_enqueue_script( $this->bilych_gallery, plugin_dir_url( __FILE__ ) . 'js/' . $this->get_current_gallery_name() . '.js', $deps, $this->version, true );

	}

	/**
	 * Replace default gallery
	 *
	 * @since    1.0.0
	 */
	public function replace_default_gallery() {

		remove_shortcode( 'gallery' );

		add_shortcode( 'gallery', array($this, 'show_gallery') );

	}

	/**
	 * Create gallery
	 *
	 * @since    1.0.0
	 */
	public function show_gallery($atts) {

		switch ( $this->get_current_gallery_name() ) {

			// Photopile Gallery
			case 'photopile':
				$img_id = explode(',', $atts['ids']);

				$html = '<div class="photopile-wrapper">';
				$html .= '<ul class="photopile">';

				foreach ($img_id as $item) {
					$img_thumb = wp_get_attachment_image_src( $item, 'thumbnail' );
					$img_full = wp_get_attachment_image_src( $item, 'full' );

					$html .= '<li>
								<a href="' . $img_full[0] . '">
									<img src="' . $img_thumb[0] . ' ">
								</a>
							  </li>';
				}

				$html .= '</ul>';
				$html .= '</div> <!-- .photopile-wrapper -->';

				return $html;
				break;

			// lightGallery
			case 'lightGallery':
				$img_id = explode(',', $atts['ids']);

				$html = '<ul id="lightGallery" class="gallery cf">';

				foreach ($img_id as $item) {
					$img_thumb = wp_get_attachment_image_src( $item, 'thumbnail' );
					$img_full = wp_get_attachment_image_src( $item, 'full' );

					$html .= '<li data-src="' . $img_full[0] . '">';
					$html .= '<a href="#"><img src="' . $img_thumb[0] . '" /></a>';
					$html .= '</li>';
				}

				$html .= '</ul> <!-- #lightGallery -->';

				return $html;
				break;

			// Unite Gallery
			case 'unitegallery':
				$img_id = explode(',', $atts['ids']);

				$html = '<div id="gallery" style="display:none;">';

				foreach ($img_id as $item) {
					$img_thumb = wp_get_attachment_image_src( $item, 'thumbnail' );
					$img_full = wp_get_attachment_image_src( $item, 'full' );

					$html .= '<img src="' . $img_thumb[0] . '" data-image="' . $img_full[0] . '">';
				}

				$html .= '</div> <!-- #gallery -->';

				return $html;
				break;
		}

	}

	/**
	 * Get current gallery name
	 *
	 * @since    1.0.0
	 */
	public function get_current_gallery_name() {

		return get_option( 'bilych_gallery_options' );

	}

}
