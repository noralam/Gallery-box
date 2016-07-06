<?php
/**
 * Gallery Box options
 * @link              http://themeforest.digitalkroy.com/gallery-box/
 * @since             1.0.0
 * @package           Gallery box wordpress plugin
 * @author Noor alam
 */
if ( !class_exists('nGalleryBox_main_options' ) ):
class nGalleryBox_main_options {

    private $settings_api;

    function __construct() {
        $this->settings_api = new ngallery_box_settings;

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
		add_submenu_page( 
		'edit.php?post_type=gallery_box',
		 __( 'Gallery Box settings', 'gbox' ),
		__( 'Gallery Box settings', 'gbox' ), 
		'manage_options',
		'gallery-box-options.php',
		array($this, 'plugin_page')
	);
    }

    function get_settings_sections() {
        $sections = array(
            array(
                'id' => 'Lightbox_settings',
                'title' => __( 'Lightbox settings', 'gbox' )
            ),
            array(
                'id' => 'img_style',
                'title' => __( 'Image gallery style', 'gbox' )
            ),
            array(
                'id' => 'youtube_style',
                'title' => __( 'Youtube gallery style', 'gbox' )
            ),
            array(
                'id' => 'vimeo_style',
                'title' => __( 'Vimeo gallery style', 'gbox' )
            ),
            array(
                'id' => 'Soundcloud_style',
                'title' => __( 'Soundcloud gallery style', 'gbox' )
            ),
            array(
                'id' => 'iframe_style',
                'title' => __( 'Iframe gallery style', 'gbox' )
            ),
          
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            'Lightbox_settings' => array(
				 array(
                    'name'    => 'loader_on',
                    'label'   => __( 'Lightbox image loader', 'gbox' ),
                    'desc'    => __( 'If you active this option, show the lightbox loader in image gallery.', 'gbox' ),
                    'type'    => 'radio',
                    'default' => 'yes',
                    'options' => array(
                        'yes'   => 'Active',
                        'no'   => 'Hide',
              
                    )
                ),
				 
				 array(
                    'name'    => 'overlayColor',
                    'label'   => __( 'Set overlay color of lightbox', 'gbox' ),
                    'desc'    => __( 'Overlay color set your choice.', 'gbox' ),
                    'type'    => 'color',
                    'default' => '#ff0000',
                   
                ),
				 array(
                    'name'    => 'overlayOpacity',
                    'label'   => __( 'Set overlay opacity', 'gbox' ),
                    'desc'    => __( 'opacity set 1 to 99.Default value 60', 'gbox' ),
                    'type'    => 'number',
                    'default' => 60,
                   
                ),
				array(
                    'name'    => 'fadeSpeed',
                    'label'   => __( 'Entry lightbox fade speed','gbox' ),
                    'desc'    => __( 'Set lightbox fade speed,default fade speed 300','gbox' ),
                    'type'    => 'number',
					'default' => 300,
                
                ),
				array(
                    'name'    => 'useCaption',
                    'label'   => __( 'lightbox caption', 'gbox' ),
                    'desc'    => __( 'You can show hide lightbox caption.', 'gbox' ),
                    'type'    => 'radio',
					'default' => 'yes',
                    'options' => array(
                        'yes' => __( 'Active','gbox' ), 
                        'No'  => __( 'Hide','gbox' ),
                    )
                ),
				array(
                    'name'    => 'useNav',
                    'label'   => __( 'Image Gallery navigation', 'gbox' ),
                    'desc'    => __( 'Gallery navigation only work in image gallery.', 'gbox' ),
                    'type'    => 'radio',
                    'default' => 'yes',
                    'options' => array(
                        'yes' => __( 'Active','gbox' ), 
                        'no'  => __( 'Hide','gbox' ),
                    )
                ),

            ),
			//Image style
            'img_style' => array(
				array(
                    'name'    => 'img_column',
                    'label'   => __( 'Image gallery column', 'gbox' ),
                    'desc'    => __( 'Set your image gallery Column. Some of the animation may not work properly in 4 column.', 'gbox' ),
                    'type'              => 'select',
                    'default' => 2,
                    'options' => array(
                        2  => __( 'Two column','gbox' ),
                        3  => __( 'Three column','gbox' ),
                        4  => __( 'Four column','gbox' ),
                    )
                ),
								array(
                    'name'    => 'img_border',
                    'label'   => __( 'Image column border', 'gbox' ),
                    'desc'    => __( 'Set your image border by px. default value 0', 'gbox' ),
                    'type'              => 'number',
                    'default' => 0,
                    
                ),
				array(
                    'name'    => 'img_border_color',
                    'label'   => __( 'Image column border color', 'gbox' ),
                    'desc'    => __( 'Set your image border color.', 'gbox' ),
                    'type'              => 'color',
                    'default' => '#ffffff',
                ),
				array(
                    'name'    => 'img_border_type',
                    'label'   => __( 'Image column border type', 'gbox' ),
                    'desc'    => __( 'Dotted may not be seen,
					When the background color and border color same.', 'gbox' ),
                    'type'    => 'radio',
                    'default' => 'solid',
                    'options' => array(
                        'solid'  => __( 'Solid','gbox' ),
                        'dotted'  => __( 'Dotted','gbox' ),
                    )
                ),
				array(
                    'name'    => 'img_animation',
                    'label'   => __( 'Select hover animation', 'gbox' ),
                    'desc'    => __( 'This plugin support 16 hover animation. select one for image gallery.','gbox' ),
                    'type'     => 'select',
                    'default' => 'ehover1',
                    'options'          => array(
						'ehover1' => __( 'Animation One', 'cmb2' ),
						'ehover2'   => __( 'Animation Two', 'cmb2' ),
						'ehover3'     => __( 'Animation Three', 'cmb2' ),
						'ehover4'     => __( 'Animation Four', 'cmb2' ),
						'ehover5'     => __( 'Animation Five', 'cmb2' ),
						'ehover6'     => __( 'Animation Six', 'cmb2' ),
						'ehover7'     => __( 'Animation Seven', 'cmb2' ),
						'ehover8'     => __( 'Animation Eight', 'cmb2' ),
						'ehover9'     => __( 'Animation Nine', 'cmb2' ),
						'ehover10'     => __( 'Animation Ten', 'cmb2' ),
						'ehover11'     => __( 'Animation Eleven', 'cmb2' ),
						'ehover12'     => __( 'Animation Twelve', 'cmb2' ),
						'ehover13'     => __( 'Animation Thirteen', 'cmb2' ),
						'ehover14'     => __( 'Animation Fourteen', 'cmb2' ),
						'ehover1v2'     => __( 'Animation Fifteen', 'cmb2' ),
						'ehover42'     => __( 'Animation Sixteen', 'cmb2' ),
						)
                ),
				array(
                    'name'    => 'img_title_back',
                    'label'   => __( 'Title background color', 'gbox' ),
                    'desc'    => __( 'Set your image gallery item title background color.', 'gbox' ),
                    'type'    => 'color',
                    'default' => '#000000',
                    
                ),
				array(
                    'name'    => 'img_title_opacity',
                    'label'   => __( 'Title background opacity', 'gbox' ),
                    'desc'    => __( 'Set your image gallery item title background opacity.Opacity value 1 to 99', 'gbox' ),
                    'type'              => 'number',
                    'default' => 50,
                    
                ),
				array(
                    'name'    => 'img_title_color',
                    'label'   => __( 'Set title color', 'gbox' ),
                    'desc'    => __( 'Set your image gallery item text color.', 'gbox' ),
                    'type'    => 'color',
                    'default' => '#ffffff',
                    
                ),
				array(
                    'name'    => 'img_title_font',
                    'label'   => __( 'Set title font size', 'gbox' ),
                    'desc'    => __( 'Default font size is 17px.', 'gbox' ),
                    'type'    => 'number',
                    'default' => 17,
                    
                ),
				array(
                    'name'    => 'img_title_transform',
                    'label'   => __( 'Select title text transform', 'gbox' ),
                    'desc'    => __( 'Set title text uppercase or lowercase.', 'gbox' ),
                    'type'    => 'radio',
                    'default' => 'uppercase',
                    'options' => array(
                        'uppercase'  => __( 'Uppercase','gbox' ),
                        'lowercase'  => __( 'Lowercase','gbox' ),
                    )
                    
                ),
				array(
                    'name'    => 'img_title_padding',
                    'label'   => __( 'Set title padding', 'gbox' ),
                    'desc'    => __( 'Set your title padding default padding is 10px.', 'gbox' ),
                    'type'    => 'number',
                    'default' => 20,
                 
                ),
				array(
                    'name'    => 'img_btn_font',
                    'label'   => __( 'Set Button font size', 'gbox' ),
                    'desc'    => __( 'Default font size 14px.', 'gbox' ),
                    'type'    => 'number',
                    'default' => 14,
                 
                ),
				array(
                    'name'    => 'img_btn_color',
                    'label'   => __( 'Button text color', 'gbox' ),
                    'desc'    => __( 'Set Image gallery item button text color.', 'gbox' ),
                    'type'    => 'color',
                    'default' => '#ffffff',
                 
                ),
				array(
                    'name'    => 'img_btn_border',
                    'label'   => __( 'Button border color', 'gbox' ),
                    'desc'    => __( 'Set Image gallery item button border color.', 'gbox' ),
                    'type'    => 'color',
                    'default' => '#ffffff',
                 
                ),
		
            ),
			//Youtube style settings
            'youtube_style' => array(
				array(
                    'name'    => 'youtube_column',
                    'label'   => __( 'Youtube gallery column.', 'gbox' ),
                    'desc'    => __( 'Set your Youtube gallery Column. Some of the animation may not work properly in 4 column.', 'gbox' ),
                    'type'    => 'select',
                    'default' => 2,
                    'options' => array(
                        2  => __( 'Two column','gbox' ),
                        3  => __( 'Three column','gbox' ),
                        4  => __( 'Four column','gbox' ),
                    )
                ),
								array(
                    'name'    => 'youtube_border',
                    'label'   => __( 'youtube column border', 'gbox' ),
                    'desc'    => __( 'Set your youtube border by px. default value 0', 'gbox' ),
                    'type'   => 'number',
                    'default' => 0,
                    
                ),
				array(
                    'name'    => 'youtube_border_color',
                    'label'   => __( 'youtube column border color', 'gbox' ),
                    'desc'    => __( 'Set your youtube border color.', 'gbox' ),
                    'type'    => 'color',
                    'default' => '#ffffff',
                ),
				array(
                    'name'    => 'youtube_border_type',
                    'label'   => __( 'youtube column border type', 'gbox' ),
                    'desc'    => __( 'Dotted may not be seen,
					When the background color and border color same.', 'gbox' ),
                    'type'    => 'radio',
                    'default' => 'solid',
                    'options' => array(
                        'solid'  => __( 'Solid','gbox' ),
                        'dotted'  => __( 'Dotted','gbox' ),
                    )
                ),
				array(
                    'name'    => 'you_animation',
                    'label'   => __( 'Select hover animation', 'gbox' ),
                    'desc'    => __( 'This plugin support 16 hover animation. select one for Youtube video gallery.','gbox' ),
                    'type'     => 'select',
                    'default' => 'ehover13',
                    'options'          => array(
						'ehover1' => __( 'Animation One', 'cmb2' ),
						'ehover2'   => __( 'Animation Two', 'cmb2' ),
						'ehover3'     => __( 'Animation Three', 'cmb2' ),
						'ehover4'     => __( 'Animation Four', 'cmb2' ),
						'ehover5'     => __( 'Animation Five', 'cmb2' ),
						'ehover6'     => __( 'Animation Six', 'cmb2' ),
						'ehover7'     => __( 'Animation Seven', 'cmb2' ),
						'ehover8'     => __( 'Animation Eight', 'cmb2' ),
						'ehover9'     => __( 'Animation Nine', 'cmb2' ),
						'ehover10'     => __( 'Animation Ten', 'cmb2' ),
						'ehover11'     => __( 'Animation Eleven', 'cmb2' ),
						'ehover12'     => __( 'Animation Twelve', 'cmb2' ),
						'ehover13'     => __( 'Animation Thirteen', 'cmb2' ),
						'ehover14'     => __( 'Animation Fourteen', 'cmb2' ),
						'ehover1v2'     => __( 'Animation Fifteen', 'cmb2' ),
						'ehover42'     => __( 'Animation Sixteen', 'cmb2' ),
						)
                ),
				array(
                    'name'    => 'you_title_back',
                    'label'   => __( 'Title background color', 'gbox' ),
                    'desc'    => __( 'Set your Youtube gallery item title background color.', 'gbox' ),
                    'type'     => 'color',
                    'default' => '#000000',
                    
                ),
				array(
                    'name'    => 'you_title_opacity',
                    'label'   => __( 'Title background opacity', 'gbox' ),
                    'desc'    => __( 'Set your Youtube gallery item title background opacity.Opacity value 1 to 99', 'gbox' ),
                    'type'    => 'number',
                    'default' => 75,
                    
                ),
				array(
                    'name'    => 'you_title_color',
                    'label'   => __( 'Set title color', 'gbox' ),
                    'desc'    => __( 'Set your Youtube gallery item text color.', 'gbox' ),
                    'type'    => 'color',
                    'default' => '#ffffff',
                    
                ),
				array(
                    'name'    => 'you_title_font',
                    'label'   => __( 'Set title font size', 'gbox' ),
                    'desc'    => __( 'Default font size is 17px.', 'gbox' ),
                    'type'    => 'number',
                    'default' => 17,
                    
                ),
				array(
                    'name'    => 'you_title_transform',
                    'label'   => __( 'Select title text transform', 'gbox' ),
                    'desc'    => __( 'Set title text uppercase or lowercase.', 'gbox' ),
                    'type'    => 'radio',
                    'default' => 'uppercase',
                    'options' => array(
                        'uppercase'  => __( 'uppercase','gbox' ),
                        'lowercase'  => __( 'Lowercase','gbox' ),
                    )
                    
                ),
				array(
                    'name'    => 'you_title_padding',
                    'label'   => __( 'Set title padding', 'gbox' ),
                    'desc'    => __( 'Set your title padding default padding is 10px.', 'gbox' ),
                    'type'    => 'number',
                    'default' => 20,
                 
                ),
				array(
                    'name'    => 'you_btn_font',
                    'label'   => __( 'Set button font size', 'gbox' ),
                    'desc'    => __( 'Default font size 14px .', 'gbox' ),
                    'type'    => 'number',
                    'default' => 14,
                 
                ),
				array(
                    'name'    => 'you_btn_color',
                    'label'   => __( 'Button text color', 'gbox' ),
                    'desc'    => __( 'Set Youtube gallery item button text color.', 'gbox' ),
                    'type'    => 'color',
                    'default' => '#ffffff',
                 
                ),
				array(
                    'name'    => 'you_btn_border',
                    'label'   => __( 'Button border color', 'gbox' ),
                    'desc'    => __( 'Set Youtube gallery item button border color.', 'gbox' ),
                    'type'    => 'color',
                    'default' => '#ffffff',
                 
                ),
			
            ),
			//vimeo style settings
            'vimeo_style' => array(
				array(
                    'name'    => 'vimeo_column',
                    'label'   => __( 'Vimeo gallery column.', 'gbox' ),
                    'desc'    => __( 'Set your Vimeo gallery Column. Some of the animation may not work properly in 4 column.', 'gbox' ),
                    'type'   => 'select',
                    'default' => 2,
                    'options' => array(
                        2  => __( 'Two column','gbox' ),
                        3  => __( 'Three column','gbox' ),
                        4  => __( 'Four column','gbox' ),
                    )
                ),
								array(
                    'name'    => 'vimeo_border',
                    'label'   => __( 'vimeo column border', 'gbox' ),
                    'desc'    => __( 'Set your vimeo border by px. default value 0', 'gbox' ),
                    'type'     => 'number',
                    'default' => 0,
                    
                ),
				array(
                    'name'    => 'vimeo_border_color',
                    'label'   => __( 'vimeo column border color', 'gbox' ),
                    'desc'    => __( 'Set your vimeo border color.', 'gbox' ),
                    'type'    => 'color',
                    'default' => '#ffffff',
                ),
				array(
                    'name'    => 'vimeo_border_type',
                    'label'   => __( 'vimeo column border type', 'gbox' ),
                    'desc'    => __( 'Dotted may not be seen,
					When the background color and border color same.', 'gbox' ),
                    'type'              => 'radio',
                    'default' => 'solid',
                    'options' => array(
                        'solid'  => __( 'Solid','gbox' ),
                        'dotted'  => __( 'Dotted','gbox' ),
                    )
                ),
				array(
                    'name'    => 'vimeo_animation',
                    'label'   => __( 'Select hover animation', 'gbox' ),
                    'desc'    => __( 'This plugin support 16 hover animation. select one for vimeo video gallery.','gbox' ),
                    'type'              => 'select',
                    'default' => 'ehover3',
                    'options'          => array(
						'ehover1' => __( 'Animation One', 'cmb2' ),
						'ehover2'   => __( 'Animation Two', 'cmb2' ),
						'ehover3'     => __( 'Animation Three', 'cmb2' ),
						'ehover4'     => __( 'Animation Four', 'cmb2' ),
						'ehover5'     => __( 'Animation Five', 'cmb2' ),
						'ehover6'     => __( 'Animation Six', 'cmb2' ),
						'ehover7'     => __( 'Animation Seven', 'cmb2' ),
						'ehover8'     => __( 'Animation Eight', 'cmb2' ),
						'ehover9'     => __( 'Animation Nine', 'cmb2' ),
						'ehover10'     => __( 'Animation Ten', 'cmb2' ),
						'ehover11'     => __( 'Animation Eleven', 'cmb2' ),
						'ehover12'     => __( 'Animation Twelve', 'cmb2' ),
						'ehover13'     => __( 'Animation Thirteen', 'cmb2' ),
						'ehover14'     => __( 'Animation Fourteen', 'cmb2' ),
						'ehover1v2'     => __( 'Animation Fifteen', 'cmb2' ),
						'ehover42'     => __( 'Animation Sixteen', 'cmb2' ),
						)
                ),
				array(
                    'name'    => 'vimeo_title_back',
                    'label'   => __( 'Title background color', 'gbox' ),
                    'desc'    => __( 'Set your Vimeo gallery item title background color.', 'gbox' ),
                    'type'    => 'color',
                    'default' => '#000000',
                    
                ),
				array(
                    'name'    => 'vimeo_title_opacity',
                    'label'   => __( 'Title background opacity', 'gbox' ),
                    'desc'    => __( 'Set your Vimeo gallery item title background opacity.Opacity value 1 to 99', 'gbox' ),
                    'type'   => 'number',
                    'default' => 50,
                    
                ),
				array(
                    'name'    => 'vimeo_title_color',
                    'label'   => __( 'Set title color', 'gbox' ),
                    'desc'    => __( 'Set your Vimeo gallery item text color.', 'gbox' ),
                    'type'    => 'color',
                    'default' => '#ffffff',
                    
                ),
				array(
                    'name'    => 'vimeo_title_font',
                    'label'   => __( 'Set title font size', 'gbox' ),
                    'desc'    => __( 'Default font size is 17px.', 'gbox' ),
                    'type'    => 'number',
                    'default' => 17,
                    
                ),
				array(
                    'name'    => 'vimeo_title_transform',
                    'label'   => __( 'Select title text transform', 'gbox' ),
                    'desc'    => __( 'Set title text uppercase or lowercase.', 'gbox' ),
                    'type'    => 'radio',
                    'default' => 'uppercase',
                    'options' => array(
                        'uppercase'  => __( 'Uppercase','gbox' ),
                        'lowercase'  => __( 'Lowercase','gbox' ),
                    )
                    
                ),
				array(
                    'name'    => 'vimeo_title_padding',
                    'label'   => __( 'Set title padding', 'gbox' ),
                    'desc'    => __( 'Set your title padding default padding is 10px.', 'gbox' ),
                    'type'    => 'number',
                    'default' => 20,
                 
                ),
				array(
                    'name'    => 'vimeo_btn_font',
                    'label'   => __( 'Set Button font size', 'gbox' ),
                    'desc'    => __( 'Default font size 14px ', 'gbox' ),
                    'type'    => 'number',
                    'default' => 14,
                 
                ),
				array(
                    'name'    => 'vimeo_btn_color',
                    'label'   => __( 'Button text color', 'gbox' ),
                    'desc'    => __( 'Set vimeo gallery item button text color.', 'gbox' ),
                    'type'    => 'color',
                    'default' => '#ffffff',
                 
                ),
				array(
                    'name'    => 'vimeo_btn_border',
                    'label'   => __( 'Button border color', 'gbox' ),
                    'desc'    => __( 'Set vimeo gallery item button border color.', 'gbox' ),
                    'type'    => 'color',
                    'default' => '#ffffff',
                 
                ),
		
            ),
			//soundcloud style settings
            'Soundcloud_style' => array(
				array(
                    'name'    => 'soundcloud_column',
                    'label'   => __( 'Soundcloud gallery column.', 'gbox' ),
                    'desc'    => __( 'Set your Soundcloud gallery Column. Some of the animation may not work properly in 4 column.', 'gbox' ),
                    'type'    => 'select',
                    'default' => 2,
                    'options' => array(
                        2  => __( 'Two column','gbox' ),
                        3  => __( 'Three column','gbox' ),
                        4  => __( 'Four column','gbox' ),
                    )
                ),
				array(
                    'name'    => 'soundcloud_border',
                    'label'   => __( 'soundcloud column border', 'gbox' ),
                    'desc'    => __( 'Set your soundcloud border by px. default value 0', 'gbox' ),
                    'type'    => 'number',
                    'default' => 0,
                    
                ),
				array(
                    'name'    => 'soundcloud_border_color',
                    'label'   => __( 'soundcloud column border color', 'gbox' ),
                    'desc'    => __( 'Set your soundcloud border color.', 'gbox' ),
                    'type'     => 'color',
                    'default' => '#ffffff',
                ),
				array(
                    'name'    => 'soundcloud_border_type',
                    'label'   => __( 'soundcloud column border type', 'gbox' ),
                    'desc'    => __( 'Dotted may not be seen,
					When the background color and border color same.', 'gbox' ),
                    'type'    => 'radio',
                    'default' => 'solid',
                    'options' => array(
                        'solid'  => __( 'Solid','gbox' ),
                        'dotted'  => __( 'Dotted','gbox' ),
                    )
                ),
				array(
                    'name'    => 'sound_animation',
                    'label'   => __( 'Select hover animation', 'gbox' ),
                    'desc'    => __( 'This plugin support 16 hover animation. select one for Soundcloud audio gallery.','gbox' ),
                    'type'     => 'select',
                    'default' => 'ehover4',
                    'options'          => array(
						'ehover1' => __( 'Animation One', 'cmb2' ),
						'ehover2'   => __( 'Animation Two', 'cmb2' ),
						'ehover3'     => __( 'Animation Three', 'cmb2' ),
						'ehover4'     => __( 'Animation Four', 'cmb2' ),
						'ehover5'     => __( 'Animation Five', 'cmb2' ),
						'ehover6'     => __( 'Animation Six', 'cmb2' ),
						'ehover7'     => __( 'Animation Seven', 'cmb2' ),
						'ehover8'     => __( 'Animation Eight', 'cmb2' ),
						'ehover9'     => __( 'Animation Nine', 'cmb2' ),
						'ehover10'     => __( 'Animation Ten', 'cmb2' ),
						'ehover11'     => __( 'Animation Eleven', 'cmb2' ),
						'ehover12'     => __( 'Animation Twelve', 'cmb2' ),
						'ehover13'     => __( 'Animation Thirteen', 'cmb2' ),
						'ehover14'     => __( 'Animation Fourteen', 'cmb2' ),
						'ehover1v2'     => __( 'Animation Fifteen', 'cmb2' ),
						'ehover42'     => __( 'Animation Sixteen', 'cmb2' ),
						)
                ),
				array(
                    'name'    => 'sound_title_back',
                    'label'   => __( 'Title background color', 'gbox' ),
                    'desc'    => __( 'Set your Soundcloud gallery item title background color.', 'gbox' ),
                    'type'    => 'color',
                    'default' => '#000000',
                    
                ),
				array(
                    'name'    => 'sound_title_opacity',
                    'label'   => __( 'Title background opacity', 'gbox' ),
                    'desc'    => __( 'Set your Soundcloud gallery item title background opacity.Opacity value 1 to 99', 'gbox' ),
                    'type'    => 'number',
                    'default' => 75,
                    
                ),
				array(
                    'name'    => 'sound_title_color',
                    'label'   => __( 'Set title color', 'gbox' ),
                    'desc'    => __( 'Set your Soundcloud gallery item text color.', 'gbox' ),
                    'type'    => 'color',
                    'default' => '#ffffff',
                    
                ),
				array(
                    'name'    => 'sound_title_font',
                    'label'   => __( 'Set title font size', 'gbox' ),
                    'desc'    => __( 'Default font size is 17px.', 'gbox' ),
                    'type'    => 'number',
                    'default' => 17,
                    
                ),
				array(
                    'name'    => 'sound_title_transform',
                    'label'   => __( 'Select title text transform', 'gbox' ),
                    'desc'    => __( 'Set title text uppercase or lowercase.', 'gbox' ),
                    'type'    => 'radio',
                    'default' => 'uppercase',
                    'options' => array(
                        'uppercase'  => __( 'Uppercase','gbox' ),
                        'lowercase'  => __( 'Lowercase','gbox' ),
                    )
                    
                ),
				array(
                    'name'    => 'sound_title_padding',
                    'label'   => __( 'Set title padding', 'gbox' ),
                    'desc'    => __( 'Set your title padding default padding is 10px.', 'gbox' ),
                    'type'    => 'number',
                    'default' => 20,
                 
                ),
				array(
                    'name'    => 'sound_btn_font',
                    'label'   => __( 'Set Button font size', 'gbox' ),
                    'desc'    => __( 'Default font size 14px.', 'gbox' ),
                    'type'    => 'number',
                    'default' => 14,
                 
                ),
				array(
                    'name'    => 'sound_btn_color',
                    'label'   => __( 'Button text color', 'gbox' ),
                    'desc'    => __( 'Set Soundcloud gallery item button text color.', 'gbox' ),
                    'type'    => 'color',
                    'default' => '#ffffff',
                 
                ),
				array(
                    'name'    => 'sound_btn_border',
                    'label'   => __( 'Button border color', 'gbox' ),
                    'desc'    => __( 'Set Soundcloud gallery item button border color.', 'gbox' ),
                    'type'    => 'color',
                    'default' => '#ffffff',
                 
                ),
			
		
			
            ),
			//iframe style settings
            'iframe_style' => array(
				array(
                    'name'    => 'iframe_column',
                    'label'   => __( 'iframe gallery column.', 'gbox' ),
                    'desc'    => __( 'Set your iframe gallery Column. Some of the animation may not work properly in 4 column.', 'gbox' ),
                    'type'  => 'select',
                    'default' => 2,
                    'options' => array(
                        2  => __( 'Two column','gbox' ),
                        3  => __( 'Three column','gbox' ),
                        4  => __( 'Four column','gbox' ),
                    )
                ),
				array(
                    'name'    => 'iframe_border',
                    'label'   => __( 'iframe column border', 'gbox' ),
                    'desc'    => __( 'Set your iframe border by px. default value 0', 'gbox' ),
                    'type'              => 'number',
                    'default' => 0,
                    
                ),
				array(
                    'name'    => 'iframe_border_color',
                    'label'   => __( 'iframe column border color', 'gbox' ),
                    'desc'    => __( 'Set your iframe border color.', 'gbox' ),
                    'type'    => 'color',
                    'default' => '#ffffff',
                ),
				array(
                    'name'    => 'iframe_border_type',
                    'label'   => __( 'iframe column border type', 'gbox' ),
                    'desc'    => __( 'Dotted may not be seen,
					When the background color and border color same.', 'gbox' ),
                    'type'    => 'radio',
                    'default' => 'solid',
                    'options' => array(
                        'solid'  => __( 'Solid','gbox' ),
                        'dotted'  => __( 'Dotted','gbox' ),
                    )
                ),
				array(
                    'name'    => 'iframe_animation',
                    'label'   => __( 'Select hover animation', 'gbox' ),
                    'desc'    => __( 'This plugin support 16 hover animation. select one for iframe gallery.','gbox' ),
                    'type'              => 'select',
                    'default' => 'ehover5',
                    'options'          => array(
						'ehover1' => __( 'Animation One', 'cmb2' ),
						'ehover2'   => __( 'Animation Two', 'cmb2' ),
						'ehover3'     => __( 'Animation Three', 'cmb2' ),
						'ehover4'     => __( 'Animation Four', 'cmb2' ),
						'ehover5'     => __( 'Animation Five', 'cmb2' ),
						'ehover6'     => __( 'Animation Six', 'cmb2' ),
						'ehover7'     => __( 'Animation Seven', 'cmb2' ),
						'ehover8'     => __( 'Animation Eight', 'cmb2' ),
						'ehover9'     => __( 'Animation Nine', 'cmb2' ),
						'ehover10'     => __( 'Animation Ten', 'cmb2' ),
						'ehover11'     => __( 'Animation Eleven', 'cmb2' ),
						'ehover12'     => __( 'Animation Twelve', 'cmb2' ),
						'ehover13'     => __( 'Animation Thirteen', 'cmb2' ),
						'ehover14'     => __( 'Animation Fourteen', 'cmb2' ),
						'ehover1v2'     => __( 'Animation Fifteen', 'cmb2' ),
						'ehover42'     => __( 'Animation Sixteen', 'cmb2' ),
						)
                ),
				array(
                    'name'    => 'iframe_title_back',
                    'label'   => __( 'Title background color', 'gbox' ),
                    'desc'    => __( 'Set your Soundcloud gallery item title background color.', 'gbox' ),
                    'type'   => 'color',
                    'default' => '#000000',
                    
                ),
				array(
                    'name'    => 'iframe_title_opacity',
                    'label'   => __( 'Title background opacity', 'gbox' ),
                    'desc'    => __( 'Set your Soundcloud gallery item title background opacity.Opacity value 1 to 99', 'gbox' ),
                    'type'    => 'number',
                    'default' => 75,
                    
                ),
				array(
                    'name'    => 'iframe_title_color',
                    'label'   => __( 'Set title color', 'gbox' ),
                    'desc'    => __( 'Set your Soundcloud gallery item text color.', 'gbox' ),
                    'type'    => 'color',
                    'default' => '#ffffff',
                    
                ),
				array(
                    'name'    => 'iframe_title_font',
                    'label'   => __( 'Set title font size', 'gbox' ),
                    'desc'    => __( 'Default font size is 17px.', 'gbox' ),
                    'type'    => 'number',
                    'default' => 17,
                    
                ),
				array(
                    'name'    => 'iframe_title_transform',
                    'label'   => __( 'Select title text transform', 'gbox' ),
                    'desc'    => __( 'Set title text uppercase or lowercase.', 'gbox' ),
                    'type'    => 'radio',
                    'default' => 'uppercase',
                    'options' => array(
                        'uppercase'  => __( 'Uppercase','gbox' ),
                        'lowercase'  => __( 'Lowercase','gbox' ),
                    )
                    
                ),
				array(
                    'name'    => 'iframe_title_padding',
                    'label'   => __( 'Set title padding', 'gbox' ),
                    'desc'    => __( 'Set your title padding default padding is 10px.', 'gbox' ),
                    'type'    => 'number',
                    'default' => 20,
                 
                ),
				array(
                    'name'    => 'iframe_btn_font',
                    'label'   => __( 'Set Button font size', 'gbox' ),
                    'desc'    => __( 'Default font size 14px.', 'gbox' ),
                    'type'    => 'number',
                    'default' => 14,
                 
                ),
				array(
                    'name'    => 'iframe_btn_color',
                    'label'   => __( 'Button text color', 'gbox' ),
                    'desc'    => __( 'Set iframe gallery item button text color.', 'gbox' ),
                    'type'    => 'color',
                    'default' => '#ffffff',
                 
                ),
				array(
                    'name'    => 'iframe_btn_border',
                    'label'   => __( 'Button border color', 'gbox' ),
                    'desc'    => __( 'Set iframe gallery item button border color.', 'gbox' ),
                    'type'    => 'color',
                    'default' => '#ffffff',
                 
                ),
			
		
			
            ),
		
        );
        return $settings_fields;
    }
    function plugin_page() {
        echo '<div class="wrap easy-solution">';
		echo '<h1>' . esc_html__( 'Gallery box settings', 'gbox' ) . '</h1>';
		echo '<div class="welcome-panel">';
        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';
        echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}
endif;
require plugin_dir_path( __FILE__ ) . '/src/class.settings-api.php';
new nGalleryBox_main_options();
