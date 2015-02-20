<?php

/**
 * Fired during plugin activation
 *
 * @link       http://rbilych.github.io
 * @since      1.0.0
 *
 * @package    Bilych_Gallery
 * @subpackage Bilych_Gallery/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Bilych_Gallery
 * @subpackage Bilych_Gallery/includes
 * @author     Ruslan Bilych <r.bilych@gmail.com>
 */
class Bilych_Gallery_Activator {

	/**
	 * Add options to DB with default value.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		update_option( 'bilych_gallery_options', 'photopile' );
	}

}
