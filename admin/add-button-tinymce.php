<?php 
/**
 * Add custom button in TinyMCE  editor for Gallery Box shortcode.
 *
 * @link              http://themeforest.digitalkroy.com/gallery-box/
 * @since             1.0.0
 * @package           Gallery box wordpress plugin
 */

// Hooks your functions into the correct filters
if ( ! function_exists( 'gbox_add_mce_button' ) ) :
function gbox_add_mce_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'gbox_tinymce_scripts' );
		add_filter( 'mce_buttons', 'gbox_tinymce_register' );
	}
}
add_action('admin_head', 'gbox_add_mce_button');
endif;
// Declare script for new button
if ( ! function_exists( 'gbox_tinymce_scripts' ) ) :
function gbox_tinymce_scripts( $plugin_array ) {
	// check administrator or editor
if( current_user_can('administrator')) {  
    	$plugin_array['my_mce_button'] = plugins_url( '/../assets/js/admin-mce-button.js', __FILE__ );
		return $plugin_array;
 }
     else{ 
   	$plugin_array['my_mce_button'] = plugins_url( '/../assets/js/mce-button.js', __FILE__ );
	return $plugin_array;
} 

}
endif;
// Register new button in the editor
if ( ! function_exists( 'gbox_tinymce_register' ) ) :
function gbox_tinymce_register( $buttons ) {
	array_push( $buttons, 'my_mce_button' );
	return $buttons;
}
endif;
// Add gallery post id dynamical in TinyMCE editor custom button
if ( ! function_exists( 'gbox_tinymce_shortcode_list_id' ) ) :
function gbox_tinymce_shortcode_list_id(){
    $gposts =  get_posts(array(
	'post_type'   => 'gallery_box',
    'post_status'      => 'publish',
	'posts_per_page'   => -1,
	'suppress_filters' => true
));
        $tinyMCE_list = array();
		$count=1;
		if($gposts) :
        foreach ($gposts as $gpost) :
			$post_ID = $gpost->ID;
			if(!empty($gpost->post_title)){
			$post_title = $gpost->post_title;
			}else{ 
			$post_title = 'Untitled gallery id -'.$post_ID ;
			}
            $tinyMCE_list[] = array( 'text' => $post_title , 'value' => '[GalleryBox id="'.$post_ID.'"]' );
        endforeach;
		else:
		$tinyMCE_list[] = array( 'text' => __('No gallery found','gbox') , 'value' => '' );
		endif;
        $jscode = $tinyMCE_list; 
		 if (is_admin()) {
        ?>
        <script type="text/javascript">
        var post_id = <?php echo json_encode($jscode); ?>
        </script>
        <?php
		}

        
    
}
foreach ( array('post.php','post-new.php') as $hook ) {
     add_action( "admin_head-$hook", 'gbox_tinymce_shortcode_list_id' );
}
endif;
