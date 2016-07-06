<?php 
/*
 * @link              http://digitalkroy.com/click-to-top/
 * @since             1.0.0
 * @package           gallery box
 * description        gallery box post type
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 * @wordpress-plugin
 */
 
 if ( ! function_exists( 'gallerybox_post_type' ) ) :
function gallerybox_post_type() {
	$labels = array(
		'name'               => __( 'galleries','gbox' ),
		'singular_name'      => __( 'gallery','gbox' ),
		'menu_name'          => __( 'Gallery Box','gbox' ),
		'name_admin_bar'     => __( 'Gallery Box','gbox' ),
		'add_new'            => __( 'Add New gallery','gbox' ),
		'add_new_item'       => __( 'Add New gallery','gbox' ),
		'new_item'           => __( 'New gallery', 'gbox' ),
		'edit_item'          => __( 'Edit gallery', 'gbox' ),
		'view_item'          => __( 'View gallery', 'gbox' ),
		'all_items'          => __( 'All gallery', 'gbox' ),
		'parent_item_colon'  => __( 'Parent gallery:', 'gbox' ),
		'not_found'          => __( 'No gallery found.', 'gbox' ),
		'not_found_in_trash' => __( 'No gallery found in Trash.', 'gbox' ),
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'You can create gallery with image, Youtube and Vimeo video, Soundcloud audio and i-frame content by gallery box.', 'gbox' ),
		'public'             => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => false,
		'rewrite'            => array( 'slug' => 'gallery-box' ),
		'capabilities' => array(
          'edit_post'          => 'edit_gallery', 
		  'read_post'          => 'read_galleries', 
		  'delete_post'        => 'delete_gallery', 
		  'delete_posts'       => 'delete_galleries', 
		  'edit_posts'         => 'edit_galleries', 
		  'edit_others_posts'  => 'edit_others_galleries', 
		  'publish_posts'      => 'publish_galleries',       
		  'read_private_posts' => 'read_private_galleries', 
		  'create_posts'       => 'create_galleries',
		),
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 25,
		'menu_icon' => 'dashicons-images-alt2',
		'supports'           => array( 'title')
	);

	register_post_type( 'gallery_box', $args );

}
 add_action( 'init', 'gallerybox_post_type' );
 endif;
 
 
/**
 * Gallery item update messages.
 *
 *
 */
 if ( ! function_exists( 'gbox_updated_messages' ) ) :
function gbox_updated_messages( $messages ) {
	global $post;
    $post_ID = $post->ID;
	$post             = get_post();
	$post_type        = get_post_type( $post );
	$post_type_object = get_post_type_object( $post_type );
	$gallery_shortcode = '[GalleryBox id="'.$post_ID.'"]';
	$messages['gallery_box'] = array(
		0  => '', // Unused. Messages start at index 1.
		1  => __('Gallery updated. Shortcode is:','gbox').'<input style="min-width:165px" type=\'text\' onClick=\'this.setSelectionRange(0, this.value.length)\' value=\''.$gallery_shortcode.'\' />',
		2  => __( 'Gallery field updated. Shortcode is:', 'gbox').'<input style="min-width:165px" type=\'text\' onClick=\'this.setSelectionRange(0, this.value.length)\' value=\''.$gallery_shortcode.'\' />',
		3  => __( 'Gallery field deleted.', 'gbox' ),
		4  => __( 'Gallery item updated.', 'gbox' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Gallery restored to revision from %s', 'gbox' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6  =>  __('Gallery published. Shortcode is:','gbox').'<input style="min-width:165px" type=\'text\' onClick=\'this.setSelectionRange(0, this.value.length)\' value=\''.$gallery_shortcode.'\' />',
		7  => __( 'Gallery saved.', 'gbox' ).'<input style="min-width:165px" type=\'text\' onClick=\'this.setSelectionRange(0, this.value.length)\' value=\''.$gallery_shortcode.'\' />',
		8  => __( 'Gallery submitted.', 'gbox' ).'<input style="min-width:165px" type=\'text\' onClick=\'this.setSelectionRange(0, this.value.length)\' value=\''.$gallery_shortcode.'\' />',
		9  => sprintf(
			__( 'Gallery item scheduled for: <strong>%1$s</strong>.', 'gbox' ),
			// translators: Publish box date format, see http://php.net/date
			date_i18n( __( 'M j, Y @ G:i', 'gbox' ), strtotime( $post->post_date ) )
		),
		10 => __( 'Gallery draft updated.', 'gbox' )
	);


	return $messages;
}
add_filter( 'post_updated_messages', 'gbox_updated_messages' );
 endif;

// Shortcode Generator
if ( ! function_exists( 'gbox_column_add_gallery_type' ) ) :
function gbox_column_add_gallery_type($post_ID) {
	if(get_post_meta($post_ID, 'img_main', true)){
    $img_main = __('Image gallery','gbox'); 
	}else{
	 $img_main = ''; 
	}
	if(get_post_meta($post_ID, 'youtube_main', true)){
    $youtube_main = __('Youtube gallery','gbox'); 
	}else{
	 $youtube_main = ''; 
	}
	if(get_post_meta($post_ID, 'vimeo_main', true)){
    $vimeo_main = __('Vimeo gallery','gbox'); 
	}else{
	 $vimeo_main = ''; 
	}
	if(get_post_meta($post_ID, 'Soundcloud_main', true)){
    $Soundcloud_main = __('Soundcloud gallery','gbox'); 
	}else{
	 $Soundcloud_main = ''; 
	}
	if(get_post_meta($post_ID, 'iframe_main', true)){
    $iframe_main = __('iframe gallery','gbox'); 
	}else{
	 $iframe_main = ''; 
	}
	$gallery_type= array($img_main,$youtube_main,$vimeo_main,$Soundcloud_main,$iframe_main);

	return $gallery_type;
	
}

add_filter('manage_gallery_box_posts_columns', 'gbox_wp_shortcode_column_head', 10);
function gbox_wp_shortcode_column_head($defaults) {
    $defaults['shortcode_generate'] = __('Gallery Shortcode','gbox');
    $defaults['gallery_images_count'] = __('Gallery type','gbox');
    return $defaults;
}
add_action('manage_gallery_box_posts_custom_column', 'gbox_wp_shortcode_column_content', 10, 2);

function gbox_wp_shortcode_column_content($column_name, $post_ID) {

    if ($column_name == 'shortcode_generate') {
        $shortcode_render = '[GalleryBox id="'.$post_ID.'"]';
       
        echo '<input style="min-width:165px" type=\'text\' onClick=\'this.setSelectionRange(0, this.value.length)\' value=\''.$shortcode_render.'\' />';
       
    }
    if ($column_name == 'gallery_images_count') {
			$gbox_type = gbox_column_add_gallery_type($post_ID);
			$type_name = array_filter($gbox_type); 
			$gbox_tottal_type = implode(", ", $type_name);
			echo $gbox_tottal_type;

    }
}
endif;
/**
 *add gallery box administrator role
 *
 *
 */
if ( ! function_exists( 'gallerybox_admin_role' ) ) :
function gallerybox_admin_role() {
    // gets the administrator role
    $admins = get_role( 'administrator' );

    $admins->add_cap( 'edit_gallery' ); 
    $admins->add_cap( 'read_galleries' ); 
    $admins->add_cap( 'delete_gallery' ); 
    $admins->add_cap( 'delete_galleries' ); 
    $admins->add_cap( 'edit_galleries' ); 
    $admins->add_cap( 'edit_others_galleries' ); 
    $admins->add_cap( 'publish_galleries' ); 
    $admins->add_cap( 'read_private_galleries' ); 
    $admins->add_cap( 'create_galleries' ); 
}
add_action( 'admin_init', 'gallerybox_admin_role');
endif;
/**
 *Remove gallery box administrator role
 *
 *
 */
if ( ! function_exists( 'gallerybox_admin_role_remove' ) ) :
function gallerybox_admin_role_remove() {
    // gets the administrator role
    $admins = get_role( 'administrator' );

    $admins->remove_cap( 'edit_gallery' ); 
    $admins->remove_cap( 'read_galleries' ); 
    $admins->remove_cap( 'delete_gallery' ); 
    $admins->remove_cap( 'delete_galleries' ); 
    $admins->remove_cap( 'edit_galleries' ); 
    $admins->remove_cap( 'edit_others_galleries' ); 
    $admins->remove_cap( 'publish_galleries' ); 
    $admins->remove_cap( 'read_private_galleries' ); 
    $admins->remove_cap( 'create_galleries' ); 
}
endif;
/**
 * Change Gallery Box title placeholder
 *
 *
 */
if ( ! function_exists( 'gbox_change_title_text' ) ) :
function gbox_change_title_text( $title ){
     $screen = get_current_screen();
 
     if  ( 'gallery_box' == $screen->post_type ) {
          $title = __('Enter gallery name','gbox');
     }
 
     return $title;
}
 
add_filter( 'enter_title_here', 'gbox_change_title_text' );
endif;