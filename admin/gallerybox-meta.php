<?php
/*
 * All metabox create here.
 *
 * @link              http://themeforest.digitalkroy.com/gallery-box/
 * @since             1.0.0
 * @package           Gallery box wordpress plugin
 */

//add group fields 

/**
 * Hook in and add a metabox to demonstrate grouped fields
 */
 if ( ! function_exists( 'gbox_meta_group' ) ) :
function gbox_meta_group() {
	/**
	 *  Gallery box meta field groups
	 */
	$gallery_box_meta = new_cmb2_box( array(
		'id'           => 'm_gallery',
		'title'        => __( 'Choose gallery type and click to add item', 'gbox' ),
		'object_types' => array( 'gallery_box', ),
	) );

	/*
	 * Image all meta options set here.
	 */
	$image_group_id = $gallery_box_meta->add_field( array(
		'id'          => 'img_main',
		'type'        => 'group',
		'options'     => array(
        'group_title'   => __( 'Click to add image gallery item', 'gbox' ),
        'add_button'    => __( 'Add more', 'gbox' ),
        'remove_button' =>  __( 'Remove', 'gbox' ),
        'closed'     => true,
		),
	) );
	$gallery_box_meta->add_group_field( $image_group_id, array(
		'name' => __( 'Enter Gallery item title', 'gbox' ),
		'desc' => __( 'Set Your gallery item title here.', 'gbox' ),
		'id'   => 'image_title',
		'type' => 'text',
	) );
	$gallery_box_meta->add_group_field( $image_group_id, array(
		'name' => __( 'Set Gallery Image', 'gbox' ),
		'desc' => __( 'This image show in front.Image size (300*300) for 4 column,(450*450) for 3 column, (600*600) for 2 column. All images use same size for better view.', 'gbox' ),
		'id'   => 'image_small',
		'type' => 'file',
	) );

	$gallery_box_meta->add_group_field( $image_group_id, array(
		'name' => __( 'Set lightbox Image', 'gbox' ),
		'desc' => __( 'This image show when lightbox open.If you don\'t set this image, gallery image will be open lightbox.', 'gbox' ),
		'id'   => 'image_light',
		'type' => 'file',
	) );
	$gallery_box_meta->add_group_field( $image_group_id, array(
		'name'       => __( 'Enter image lightbox caption', 'gbox' ),
		'desc' 		=> __( 'Set your lightbox caption.You can hide or show caption by lightbox settings.Default caption is item title', 'gbox' ),
		'id'         => 'img_caption',
		'type'       => 'text',
	) );

	$gallery_box_meta->add_group_field( $image_group_id, array(
		'name'       => __( 'Enter button text', 'gbox' ),
		'desc' 		=> __( 'Button text must be small.Default button text is( view large )', 'gbox' ),
		'id'         => 'img_btn_text',
		'type'       => 'text',
	) );



	/*
	 *Youtube all options meta set here.
	 */
	$Youtube_group_id = $gallery_box_meta->add_field( array(
		'id'          => 'youtube_main',
		'type'        => 'group',
		'options'     => array(
        'group_title'   => __( 'Click to add Youtube video gallery item', 'gbox' ), 
        'add_button'    => __( 'Add more', 'gbox' ),
        'remove_button' =>  __( 'Remove', 'gbox' ),
        'closed'     => true,
		),
	) );

	$gallery_box_meta->add_group_field( $Youtube_group_id, array(
		'name' => __( 'Enter Gallery item title', 'gbox' ),
		'desc' => __( 'Youtube Gallery item title enter here. ', 'gbox' ),
		'id'   => 'you_title',
		'type' => 'text',
		'allow' => array( 'url', 'attachment' )

	) );
	$gallery_box_meta->add_group_field( $Youtube_group_id, array(
		'name'       => __( 'Enter video ID', 'gbox' ),
		'desc' 		=> __( 'Past or type Youtube video id. Go Youtube url and copy video id and past id in this box.To know more see documentation.', 'gbox' ),
		'id'         => 'you_id',
		'type'       => 'text',
	) );

	$gallery_box_meta->add_group_field( $Youtube_group_id, array(
		'name' => __( 'Set Youtube Gallery Image', 'gbox' ),
		'desc' => __( '(optional) This image show in front.Image size (300*300) for 4 column,(450*450) for 3 column, (600*600) for 2 column.Default image is ( Youtube default image)', 'gbox' ),
		'id'   => 'you_image',
		'type' => 'file',
		'allow' => array( 'url', 'attachment' )

	) );

	$gallery_box_meta->add_group_field( $Youtube_group_id, array(
		'name'       => __( 'Enter video lightbox caption', 'gbox' ),
		'desc' 		=> __( 'Set your lightbox caption.You can hide or show caption by lightbox settings.Default caption is item title', 'gbox' ),
		'id'         => 'You_caption',
		'type'       => 'text',
	) );
	$gallery_box_meta->add_group_field( $Youtube_group_id, array(
		'name'       => __( 'Enter youtube video width', 'gbox' ),
		'desc' 		=> __( 'Youtube video lightbox width. Default width 600 )', 'gbox' ),
		'id'         => 'you_width',
		'type'       => 'text',
		'attributes' => array(
		'type' => 'number',
		'pattern' => '\d*',
		)
	) );

	$gallery_box_meta->add_group_field( $Youtube_group_id, array(
		'name'       => __( 'Enter youtube video height', 'gbox' ),
		'desc' 		=> __( 'Youtube video lightbox height. Default height 400 )', 'gbox' ),
		'id'         => 'you_height',
		'type'       => 'text',
		'attributes' => array(
		'type' => 'number',
		'pattern' => '\d*', 
		)
	) );

	$gallery_box_meta->add_group_field( $Youtube_group_id, array(
		'name'       => __( 'Enter button text', 'gbox' ),
		'desc' 		=> __( 'Button text must be small.Default button text is( Show video )', 'gbox' ),
		'id'         => 'youtube_button',
		'type'       => 'text',
	) );


	/*
	 *vimeo all options meta options.
	 */
	$vimeo_group_id = $gallery_box_meta->add_field( array(
		'id'          => 'vimeo_main',
		'type'        => 'group',
		'options'     => array(
        'group_title'   => __( ' Click to add Vimeo video gallery item', 'gbox' ),
		'add_button'    => __( 'Add more', 'gbox' ),
        'remove_button' =>  __( 'Remove', 'gbox' ),
        'closed'     => true,
		),
	) );
	$gallery_box_meta->add_group_field( $vimeo_group_id, array(
		'name' => __( 'Enter gallery item title', 'gbox' ),
		'desc' => __( 'Vimeo gallery item title enter here.', 'gbox' ),
		'id'   => 'vimeo_title',
		'type' => 'text',
	) );
	$gallery_box_meta->add_group_field( $vimeo_group_id, array(
		'name'       => __( 'Enter Vimeo video ID', 'gbox' ),
		'desc' => __( 'Past or type Vimeo video id. Go Vimeo url and copy video id and past id in this box.To know more see documentation.', 'gbox' ),
		'id'         => 'vimeo_id',
		'type'       => 'text',
	) );
	$gallery_box_meta->add_group_field( $vimeo_group_id, array(
		'name' => __( 'Set Vimeo Gallery Image', 'gbox' ),
		'desc' => __( '(optional) This image show in front.Image size (300*300) for 4 column,(450*450) for 3 column, (600*600) for 2 column. All images use same size for better view.Default image is ( Vimeo default image )', 'gbox' ),
		'id'   => 'vimeo_image',
		'type' => 'file',
	) );
	$gallery_box_meta->add_group_field( $vimeo_group_id, array(
		'name'       => __( 'Enter lightbox caption', 'gbox' ),
		'desc' => __( 'Set your lightbox caption.You can hide or show caption by lightbox settings.', 'gbox' ),
		'id'         => 'vimeo_caption',
		'type'       => 'text',
	) );


	$gallery_box_meta->add_group_field( $vimeo_group_id, array(
		'name'       => __( 'Enter Vimeo video width', 'gbox' ),
		'desc' => __( 'Vimeo video lightbox width. Default width 600)', 'gbox' ),
		'id'         => 'vim_width',
		'type'       => 'text',
		'attributes' => array(
		'type' => 'number',
		'pattern' => '\d*',
     )		
	) );
	$gallery_box_meta->add_group_field( $vimeo_group_id, array(
		'name'       => __( 'Enter Vimeo video height', 'gbox' ),
		'desc' => __( 'Vimeo video lightbox height. Default height 400)', 'gbox' ),
		'id'         => 'vim_height',
		'type'       => 'text',
		'attributes' => array(
		'type' => 'number',
		'pattern' => '\d*',
		)
	) );
	
	$gallery_box_meta->add_group_field( $vimeo_group_id, array(
		'name'       => __( 'Enter button text', 'gbox' ),
		'desc' 		=> __( 'Button text must be small.Default button text is( Show video )', 'gbox' ),
		'id'         => 'vimeo_button',
		'type'       => 'text',
	) );

	/*
	 * Soundcloud audio gallery  meta options.
	 */

	$Soundcloud_group_id = $gallery_box_meta->add_field( array(
		'id'          => 'Soundcloud_main',
		'type'        => 'group',
		'options'     => array(
        'group_title'   => __( 'Click to add Soundcloud audio gallery item', 'gbox' ),
		'add_button'    => __( 'Add more', 'gbox' ),
        'remove_button' =>  __( 'Remove', 'gbox' ),
        'closed'     => true,
		),
	) );
	$gallery_box_meta->add_group_field( $Soundcloud_group_id, array(
		'name' => __( 'Enter gallery item title', 'gbox' ),
		'desc' => __( 'Soundcloud gallery item title enter here.', 'gbox' ),
		'id'   => 'sound_title',
		'type' => 'text',
	) );
	$gallery_box_meta->add_group_field( $Soundcloud_group_id, array(
		'name'       => __( 'Enter Soundcloud track id', 'gbox' ),
		'desc' => __( 'First select Soundcloud audio then copy audio id   from share button.', 'gbox' ),
		'id'         => 'sound_id',
		'type'       => 'text',
	) );
	$gallery_box_meta->add_group_field( $Soundcloud_group_id, array(
		'name' => __( 'Set Soundcloud Gallery Image', 'gbox' ),
		'desc' => __( 'This image show in front.Image size (300*300) for 4 column,(450*450) for 3 column, (600*600) for 2 column. All images use same size for better view.', 'gbox' ),
		'id'   => 'sound_image',
		'type' => 'file',
	) );
		
	$gallery_box_meta->add_group_field( $Soundcloud_group_id, array(
		'name'       => __( 'Enter Soundtrack lightbox caption', 'gbox' ),
		'id'         => 'Sound_caption',
		'desc' => __( 'Set your lightbox caption.You can hide or show caption by lightbox settings.Default caption is item title', 'gbox' ),
		'type'       => 'text',
	) );


	$gallery_box_meta->add_group_field( $Soundcloud_group_id, array(
		'name'       => __( 'Enter button text', 'gbox' ),
		'desc' => __( 'Button text must be small.Default button text is( Listen song )', 'gbox' ),
		'id'         => 'Soundcloud_btn',
		'type'       => 'text',
	) );


	/*
	 * Iframe gallery  meta options.
	 */
	$iframe_group_id = $gallery_box_meta->add_field( array(
		'id'          => 'iframe_main',
		'type'        => 'group',
		'options'     => array(
        'group_title'   => __( 'Click to add iframe gallery item', 'gbox' ), // since
		'add_button'    => __( 'Add more', 'gbox' ),
        'remove_button' =>  __( 'Remove', 'gbox' ),
        'closed'     => true,
		),
	) );
	$gallery_box_meta->add_group_field( $iframe_group_id, array(
		'name' => __( 'Enter gallery item title', 'gbox' ),
		'desc' => __( 'Iframe gallery item title enter here.', 'gbox' ),
		'id'   => 'Iframe_title',
		'type' => 'text',
	) );
	$gallery_box_meta->add_group_field( $iframe_group_id, array(
		'name' => __( 'Set Iframe Gallery Image', 'gbox' ),
		'desc' => __( 'This image show in front.Image size (300*300) for 4 column,(450*450) for 3 column, (600*600) for 2 column.All images use same size for better view.', 'gbox' ),
		'id'   => 'Iframe_image',
		'type' => 'file',
	) );
	$gallery_box_meta->add_group_field( $iframe_group_id, array(
		'name'       => __( 'Enter page url', 'gbox' ),
		'desc'        =>  __('Copy your webpage url and past this box.', 'gbox' ),
		'id'         => 'iframe_url',
		'type'       => 'text_url',
	) );	
	$gallery_box_meta->add_group_field( $iframe_group_id, array(
		'name'       => __( 'Enter lightbox iframe caption', 'gbox' ),
		'desc' => __( 'Set your lightbox caption.You can hide or show caption by lightbox settings.Default caption is item title', 'gbox' ),
		'id'         => 'iframe_caption',
		'type'       => 'text',
	) );

	$gallery_box_meta->add_group_field( $iframe_group_id, array(
		'name'       => __( 'Enter iframe width', 'gbox' ),
		'desc' => __( 'Iframe lightbox width. Default width 600)', 'gbox' ),
		'id'         => 'iframe_width',
		'type'       => 'text',
		'attributes' => array(
		'type' => 'number',
		'pattern' => '\d*',
	),
	) );
	$gallery_box_meta->add_group_field( $iframe_group_id, array(
		'name'       => __( 'Enter iframe height', 'gbox' ),
		'desc' => __( 'Iframe lightbox height. Default height 400)', 'gbox' ),
		'id'         => 'iframe_height',
		'type'       => 'text',
		'attributes' => array(
		'type' => 'number',
		'pattern' => '\d*',
	),
	) );
	$gallery_box_meta->add_group_field( $iframe_group_id, array(
		'name'       => __( 'Enter button text', 'gbox' ),
		'desc' => __( 'Button text must be small.Default button text is( SHOW IFRAME )', 'gbox' ),
		'id'         => 'iframe_button',
		'type'       => 'text',
	) );
	
}
add_action( 'cmb2_admin_init', 'gbox_meta_group');

endif;