<?php

/**
 * Provide a dashboard view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://rbilych.github.io
 * @since      1.0.0
 *
 * @package    Bilych_Gallery
 * @subpackage Bilych_Gallery/admin/partials
 */
?>

<?php $checked = get_option( 'bilych_gallery_options' ); ?>

<label class="bilych-gallery-radio">
	<input type="radio" name="bilych_gallery_options" value="photopile" <?php checked( $checked, 'photopile' ); ?> >
	<img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/photopile.png'; ?>" alt="photopile">
</label>

<label class="bilych-gallery-radio">
	<input type="radio" name="bilych_gallery_options" value="lightGallery" <?php checked( $checked, 'lightGallery' ); ?> >
	<img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/lightGallery.png'; ?>" alt="lightGallery">
</label>

<label class="bilych-gallery-radio">
	<input type="radio" name="bilych_gallery_options" value="unitegallery" <?php checked( $checked, 'unitegallery' ); ?> >
	<img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/unitegallery.png'; ?>" alt="unitegallery">
</label>
