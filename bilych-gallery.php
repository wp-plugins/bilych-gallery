<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * Dashboard. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://rbilych.github.io
 * @since             1.0.0
 * @package           Bilych_Gallery
 *
 * @wordpress-plugin
 * Plugin Name:       Bilych Gallery
 * Plugin URI:        http://rbilych.github.io
 * Description:       This plugin replace default Wordpress gallery.
 * Version:           1.0.0
 * Author:            Ruslan Bilych
 * Author URI:        http://rbilych.github.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bilych-gallery
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bilych-gallery-activator.php
 */
function activate_bilych_gallery() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bilych-gallery-activator.php';
	Bilych_Gallery_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bilych-gallery-deactivator.php
 */
function deactivate_bilych_gallery() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bilych-gallery-deactivator.php';
	Bilych_Gallery_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bilych_gallery' );
register_deactivation_hook( __FILE__, 'deactivate_bilych_gallery' );

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bilych-gallery.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bilych_gallery() {

	$plugin = new Bilych_Gallery();
	$plugin->run();

}
run_bilych_gallery();
