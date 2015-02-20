<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://rbilych.github.io
 * @since      1.0.0
 *
 * @package    Bilych_Gallery
 * @subpackage Bilych_Gallery/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Bilych_Gallery
 * @subpackage Bilych_Gallery/includes
 * @author     Ruslan Bilych <r.bilych@gmail.com>
 */
class Bilych_Gallery_Deactivator {

	/**
	 * Delete options from DB.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		delete_option( 'bilych_gallery_options' );
	}

}
