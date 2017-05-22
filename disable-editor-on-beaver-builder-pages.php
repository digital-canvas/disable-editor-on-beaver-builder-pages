<?php
/*
Plugin Name: Disable Editor
Description: Disable editor tabs on pages managed with beaver builder
Version: 1.0.0
Author: Jonathan Bernardi
Author URI: https://www.digitalcanvas.com
License: GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.txt
*/

function disable_editor_on_beaver_builder_pages() {
	$current = get_current_screen();
	if ( $current->base == 'post' && $current->post_type == 'page' ) {
		$user = wp_get_current_user();
		if ( ! in_array( 'administrator', $user->roles ) ) {
			// current user is not an administrator
			wp_enqueue_style( 'disable-editor-on-beaver-builder-pages', plugins_url( 'disable-editor-on-beaver-builder-pages.css', __FILE__ ) );
		}
	}
}

add_action( 'admin_enqueue_scripts', 'disable_editor_on_beaver_builder_pages' );
