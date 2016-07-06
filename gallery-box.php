<?php
/*
 * @link              http://themeforest.digitalkroy.com/gallery-box/
 * @since             1.0.0
 * @package           Gallery box wordpress plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Gallery Box
 * Plugin URI:        http://themeforest.digitalkroy.com/gallery-box/
 * Description:       You can create awesome image,audio, video and i-frame gellery with lots of effects By this plugin.
 * Version:           1.0.0
 * Author:            Noor alam
 * Author URI:        http://codecanyon.net/user/noor-alam
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gbox
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * 
 * admin specific file includes
 */
 if ( is_admin() ) {
     // We are in admin mode
require_once( plugin_dir_path(__FILE__).'/admin/gallerybox-post-type.php' );
require_once( plugin_dir_path(__FILE__).'/admin/gallerybox-options.php' );
require_once( plugin_dir_path(__FILE__).'/admin/gallerybox-meta.php' );
require_once( plugin_dir_path(__FILE__).'/admin/add-button-tinymce.php' );
require_once( plugin_dir_path(__FILE__).'/admin/src/CMB-metabox/init.php' );

}


/**
 * public specific file includes
 * 
 */
require_once( plugin_dir_path(__FILE__). '/includes/gallerybox-shortcode.php');
require_once( plugin_dir_path(__FILE__). '/includes/gallerybox-options-set.php');


	/**
	 * Load the plugin all style and script.
	 *
	 * @since    1.0.0
	 */

 if ( ! function_exists( 'gbox_style_scripts' ) ) :
function gbox_style_scripts() {
//style enqueue
wp_enqueue_style( 'galleryBox-effects', plugins_url( '/assets/css/effects.css', __FILE__ ), array(), '1.0', 'all');
wp_enqueue_style( 'galleryBox-colabthi-webfont', plugins_url( '/assets/fonts/colabthi-webfont.css', __FILE__ ), array(), '1.0', 'all');
wp_enqueue_style( 'galleryBox-style', plugins_url( '/assets/css/galleryBox-style.css', __FILE__ ), array(), '1.0', 'all');
//scripts enqueue
wp_enqueue_script('jquery');
wp_enqueue_script( 'galleryBox-jquery.poptrox', plugins_url( '/assets/js/jquery.poptrox.min.js', __FILE__ ), array( 'jquery' ), '2.5.1', true);

}
add_action( 'wp_enqueue_scripts', 'gbox_style_scripts' );
endif;

/**
 * Admin style enqueue.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'gbox_admin_scripts' ) ) :
 function gbox_admin_scripts() {
	wp_enqueue_style('galleryBox_admin', plugins_url('/assets/css/galleryBox-admin.css', __FILE__) );
}
add_action( 'admin_enqueue_scripts', 'gbox_admin_scripts' );
endif;
/**
 * Gallery Box admin role.
 *
 */ 
 if ( ! function_exists( 'gallerybox_activation_setup' ) ) :
function gallerybox_activation_setup() {
    // Trigger our function that registers the custom post type
    gallerybox_post_type();
 
    // Clear the permalinks after the post type has been registered
    flush_rewrite_rules();
    // Add new administrator role
	gallerybox_admin_role();
}
register_activation_hook( __FILE__, 'gallerybox_activation_setup' ); 
endif; 
 if ( ! function_exists( 'gallerybox_deactivation_setup' ) ) :
function gallerybox_deactivation_setup() {
 
    // Clear the permalinks to remove our post type's rules
    flush_rewrite_rules();
	
	// gets the administrator role remove
	gallerybox_admin_role_remove();
 
}
register_deactivation_hook( __FILE__, 'gallerybox_deactivation_setup' );
endif;
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
 if ( ! function_exists( 'gbox_textdomain' ) ) :
function gbox_textdomain() {
  load_plugin_textdomain( 'gbox', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' ); 
}
add_action( 'plugins_loaded', 'gbox_textdomain' );
endif;

//Add custom image size
add_image_size( 'gBox-medium', 450, 450, true ); 
add_image_size( 'gBox-large', 600, 600, true ); 