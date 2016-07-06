<?php 
/*
 * @link              http://themeforest.digitalkroy.com/gallery-box/
 * @since             1.0.0
 * @package           Gallery box wordpress plugin    
 * description        All gallery options set
 *
 * @  Gallery box
 */
 if ( ! function_exists( 'gbox_style_add' ) ) :
 function gbox_style_add(){
 //image gallery options
 if($Gimage = get_option('img_style')){
$Gimage = get_option('img_style');
}

$img_title_back = isset( $Gimage['img_title_back'] )  ? $Gimage['img_title_back'] : '#000000'; 
$img_border = isset( $Gimage['img_border'] ) ? $Gimage['img_border'] : 0; 
$img_border_color = isset( $Gimage['img_border_color'] ) ? $Gimage['img_border_color'] :'#ffffff'; 
$img_border_type = isset( $Gimage['img_border_type'] ) ? $Gimage['img_border_type'] :'solid'; 
$img_title_opacity = isset( $Gimage['img_title_opacity'] ) ? $Gimage['img_title_opacity'] : 75; 
$img_title_color = isset( $Gimage['img_title_color'] ) ? $Gimage['img_title_color'] : '#ffffff'; 
$img_title_font = isset( $Gimage['img_title_font'] ) ? $Gimage['img_title_font'] : 17 ;
$img_title_transform = isset( $Gimage['img_title_transform'] ) ? $Gimage['img_title_transform'] :'uppercase' ;
$img_title_padding = isset( $Gimage['img_title_padding'] ) ? $Gimage['img_title_padding'] :20;
$img_btn_font = isset( $Gimage['img_btn_font'] ) ? $Gimage['img_btn_font'] : 14;
$img_btn_color = isset( $Gimage['img_btn_color'] ) ? $Gimage['img_btn_color'] :'#ffffff';
$img_btn_border = isset( $Gimage['img_btn_border'] ) ? $Gimage['img_btn_border'] :'#ffffff';

 //Youtube gallery options
 if($Gyoutube = get_option('youtube_style')){
$Gyoutube = get_option('youtube_style');
}
$youtube_column = isset( $Gyoutube['youtube_column'] ) ? $Gyoutube['youtube_column'] : 'Three'; 
$you_title_back = isset( $Gyoutube['you_title_back'] ) ? $Gyoutube['you_title_back'] : '#000000';
$youtube_border = isset( $Gyoutube['youtube_border'] )? $Gyoutube['youtube_border'] : 0; 
$youtube_border_color = isset( $Gyoutube['youtube_border_color'] ) ? $Gyoutube['youtube_border_color'] :'#ffffff'; 
$youtube_border_type = isset( $Gyoutube['youtube_border_type'] ) ? $Gyoutube['youtube_border_type'] :'solid'; 
$you_title_opacity = isset( $Gyoutube['you_title_opacity'] ) ? $Gyoutube['you_title_opacity'] : 75; 
$you_title_color = isset( $Gyoutube['you_title_color'] ) ? $Gyoutube['you_title_color'] : '#ffffff'; 
$you_title_font = isset( $Gyoutube['you_title_font'] ) ? $Gyoutube['you_title_font'] : 17 ;
$you_title_transform = isset( $Gyoutube['you_title_transform'] ) ? $Gyoutube['you_title_transform'] :'uppercase' ;
$you_title_padding = isset( $Gyoutube['you_title_padding'] ) ? $Gyoutube['you_title_padding'] : 20;
$you_btn_font = isset( $Gyoutube['you_btn_font'] ) ? $Gyoutube['you_btn_font'] : 14;
$you_btn_color = isset( $Gyoutube['you_btn_color'] ) ? $Gyoutube['you_btn_color'] : '#ffffff';
$you_btn_border = isset( $Gyoutube['you_btn_border'] ) ? $Gyoutube['you_btn_border'] : '#ffffff';

 //Vimeo gallery options
 if($Gvimeo = get_option('vimeo_style')){
$Gvimeo = get_option('vimeo_style');
}
$vimeo_title_back = isset( $Gvimeo['vimeo_title_back'] ) ? $Gvimeo['vimeo_title_back'] : '#000000';
$vimeo_border = isset( $Gvimeo['vimeo_border'] ) ? $Gvimeo['vimeo_border'] : 0; 
$vimeo_border_color = isset( $Gvimeo['vimeo_border_color'] ) ? $Gvimeo['vimeo_border_color'] :'#ffffff'; 
$vimeo_border_type = isset( $Gvimeo['vimeo_border_type'] ) ? $Gvimeo['vimeo_border_type'] :'solid';  
$vimeo_title_opacity = isset( $Gvimeo['vimeo_title_opacity'] ) ? $Gvimeo['vimeo_title_opacity'] : 50; 
$vimeo_title_color = isset( $Gvimeo['vimeo_title_color'] ) ? $Gvimeo['vimeo_title_color'] : '#ffffff'; 
$vimeo_title_font = isset( $Gvimeo['vimeo_title_font'] ) ? $Gvimeo['vimeo_title_font'] : 17 ;
$vimeo_title_transform = isset( $Gvimeo['vimeo_title_transform'] ) ? $Gvimeo['vimeo_title_transform'] :'uppercase' ;
$vimeo_title_padding = isset( $Gvimeo['vimeo_title_padding'] ) ? $Gvimeo['vimeo_title_padding'] :20;
$vimeo_btn_font = isset( $Gvimeo['vimeo_btn_font'] ) ? $Gvimeo['vimeo_btn_font'] :14 ;
$vimeo_btn_color = isset( $Gvimeo['vimeo_btn_color'] ) ? $Gvimeo['vimeo_btn_color'] :'#ffffff' ;
$vimeo_btn_border = isset( $Gvimeo['vimeo_btn_border'] ) ? $Gvimeo['vimeo_btn_border'] :'#ffffff' ;

 //Soundcloud gallery options
 if($GSound = get_option('Soundcloud_style')){
$GSound = get_option('Soundcloud_style');
}
$sound_title_back = isset( $GSound['sound_title_back'] ) ? $GSound['sound_title_back'] : '#000000';
$soundcloud_border = isset( $GSound['soundcloud_border'] ) ? $GSound['soundcloud_border'] : 0; 
$soundcloud_border_color = isset( $GSound['soundcloud_border_color'] ) ? $GSound['soundcloud_border_color'] :'#ffffff'; 
$soundcloud_border_type = isset( $GSound['soundcloud_border_type'] ) ? $GSound['soundcloud_border_type'] :'solid';  
$sound_title_opacity = isset( $GSound['sound_title_opacity'] ) ? $GSound['sound_title_opacity'] : 75; 
$sound_title_color = isset( $GSound['sound_title_color'] ) ? $GSound['sound_title_color'] : '#ffffff'; 
$sound_title_font = isset( $GSound['sound_title_font'] ) ? $GSound['sound_title_font'] : 17 ;
$sound_title_transform = isset( $GSound['sound_title_transform'] ) ? $GSound['sound_title_transform'] :'uppercase' ;
$sound_title_padding = isset( $GSound['sound_title_padding'] ) ? $GSound['sound_title_padding'] :20;
$sound_btn_font = isset( $GSound['sound_btn_font'] ) ? $GSound['sound_btn_font'] :14;
$sound_btn_color = isset( $GSound['sound_btn_color'] ) ? $GSound['sound_btn_color'] :'#ffffff';
$sound_btn_border = isset( $GSound['sound_btn_border'] ) ? $GSound['sound_btn_border'] :'#ffffff';

 //iframe gallery options
 if($Giframe = get_option('iframe_style')){
$Giframe = get_option('iframe_style');
}
$iframe_column = isset( $Giframe['iframe_column'] ) ? $Giframe['iframe_column'] : 'Three'; 
$iframe_border = isset( $Giframe['iframe_border'] ) ? $Giframe['iframe_border'] : 0; 
$iframe_border_color = isset( $Giframe['iframe_border_color'] ) ? $Giframe['iframe_border_color'] :'#ffffff'; 
$iframe_border_type =  isset( $Giframe['iframe_border_type'] ) ? $Giframe['iframe_border_type'] :'solid'; 
$iframe_title_back = isset( $Giframe['iframe_title_back'] ) ? $Giframe['iframe_title_back'] : '#000000'; 
$iframe_title_opacity = isset( $Giframe['iframe_title_opacity'] ) ? $Giframe['iframe_title_opacity'] : 75; 
$iframe_title_color = isset( $Giframe['iframe_title_color'] ) ? $Giframe['iframe_title_color'] : '#ffffff'; 
$iframe_title_font = isset( $Giframe['iframe_title_font'] ) ? $Giframe['iframe_title_font'] : 17 ;
$iframe_title_transform = isset( $Giframe['iframe_title_transform'] ) ? $Giframe['iframe_title_transform'] :'uppercase' ;
$iframe_title_padding = isset( $Giframe['iframe_title_padding'] ) ? $Giframe['iframe_title_padding'] :20;
$iframe_btn_font = isset( $Giframe['iframe_btn_font'] ) ? $Giframe['iframe_btn_font'] :14;
$iframe_btn_color = isset( $Giframe['iframe_btn_color'] ) ? $Giframe['iframe_btn_color'] :'#ffffff';
$iframe_btn_border = isset( $Giframe['iframe_btn_border'] ) ? $Giframe['iframe_btn_border'] :'#ffffff';

  ?>
<style type="text/css"> 
#boxGallery .You-gallery{
    border: <?php echo esc_attr($youtube_border); ?>px <?php echo esc_attr($youtube_border_type); ?> <?php echo esc_attr($youtube_border_color); ?>;

} 
#boxGallery .Vimeo-gallery{
    border: <?php echo esc_attr($vimeo_border); ?>px <?php echo esc_attr($vimeo_border_type); ?> <?php echo esc_attr($vimeo_border_color); ?>;

} 
#boxGallery .Sound-gallery{
    border: <?php echo esc_attr($soundcloud_border); ?>px <?php echo esc_attr($soundcloud_border_type); ?> <?php echo esc_attr($soundcloud_border_color); ?>;

} 
#boxGallery .iframe-gallery{
   border: <?php echo esc_attr($iframe_border); ?>px <?php echo esc_attr($iframe_border_type); ?> <?php echo esc_attr($iframe_border_color); ?>;

} 
#boxGallery .images-gallery{
  border: <?php echo esc_attr($img_border); ?>px <?php echo esc_attr($img_border_type); ?> <?php echo esc_attr($img_border_color); ?>;
}
#boxGallery .You-gallery h2::before {
  background: <?php echo esc_attr($you_title_back); ?> none repeat scroll 0 0;
  opacity: 0.<?php echo esc_attr($you_title_opacity); ?>;
}
#boxGallery .You-gallery h2 {
  color: <?php echo esc_attr($you_title_color); ?>;
  font-size: <?php echo esc_attr($you_title_font); ?>px;
  padding: <?php echo esc_attr($you_title_padding); ?>px;
  text-transform: <?php echo esc_attr($you_title_transform); ?>;
} 

#boxGallery .Vimeo-gallery h2::before {
  background: <?php echo esc_attr($vimeo_title_back); ?> none repeat scroll 0 0;
  opacity: 0.<?php echo esc_attr($vimeo_title_opacity); ?>;
}
#boxGallery .Vimeo-gallery h2 {
  color: <?php echo esc_attr($vimeo_title_color); ?>;
  font-size: <?php echo esc_attr($vimeo_title_font); ?>px;
  padding: <?php echo esc_attr($vimeo_title_padding); ?>px;
  text-transform: <?php echo esc_attr($vimeo_title_transform); ?>;
} 

#boxGallery .Sound-gallery h2::before {
  background: <?php echo esc_attr($sound_title_back); ?> none repeat scroll 0 0;
  opacity: 0.<?php echo esc_attr($sound_title_opacity); ?>;
}
#boxGallery .Sound-gallery h2 {
  color: <?php echo esc_attr($sound_title_color); ?>;
  font-size: <?php echo esc_attr($sound_title_font); ?>px;
  padding: <?php echo esc_attr($sound_title_padding); ?>px;
  text-transform: <?php echo esc_attr($sound_title_transform); ?>;
} 

#boxGallery .iframe-gallery h2::before {
  background: <?php echo esc_attr($iframe_title_back); ?> none repeat scroll 0 0;
  opacity: 0.<?php echo esc_attr($iframe_title_opacity); ?>;
}
#boxGallery .iframe-gallery h2 {
  color: <?php echo esc_attr($iframe_title_color); ?>;
  font-size: <?php echo esc_attr($iframe_title_font); ?>px;
  padding: <?php echo esc_attr($iframe_title_padding); ?>px;
  text-transform: <?php echo esc_attr($iframe_title_transform); ?>;
}
 
#boxGallery .images-gallery h2::before {
  background: <?php echo esc_attr($img_title_back); ?> none repeat scroll 0 0;
  opacity: 0.<?php echo esc_attr($img_title_opacity); ?>;
}
#boxGallery .images-gallery h2 {
  color: <?php echo esc_attr($img_title_color); ?>;
  font-size: <?php echo esc_attr($img_title_font); ?>px;
  padding: <?php echo esc_attr($img_title_padding); ?>px;
  text-transform: <?php echo esc_attr($img_title_transform); ?>;
}

#boxGallery .images-gallery .overlay button.info {
  border: 1px solid <?php echo esc_attr($img_btn_border); ?>;
  color: <?php echo esc_attr($img_btn_color); ?>;
   font-size: <?php echo esc_attr($img_btn_font); ?>px;

}

#boxGallery .You-gallery .overlay button.info {
  border: 1px solid <?php echo esc_attr($you_btn_border); ?>;
  color: <?php echo esc_attr($you_btn_color); ?>;
  font-size: <?php echo esc_attr($you_btn_font); ?>px;
}

#boxGallery .Vimeo-gallery .overlay button.info {
  border: 1px solid <?php echo esc_attr($vimeo_btn_border); ?>;
  color: <?php echo esc_attr($vimeo_btn_color); ?>;
  font-size: <?php echo esc_attr($vimeo_btn_font); ?>px;

}

#boxGallery .Sound-gallery .overlay button.info {
  border: 1px solid <?php echo esc_attr($sound_btn_border); ?>;
  color: <?php echo esc_attr($sound_btn_color); ?>;
  font-size: <?php echo esc_attr($sound_btn_font); ?>px;

}

#boxGallery .iframe-gallery .overlay button.info {
  border: 1px solid <?php echo esc_attr($iframe_btn_border); ?>;
  color: <?php echo esc_attr($iframe_btn_color); ?>;
  font-size: <?php echo esc_attr($iframe_btn_font); ?>px;

}


</style>
<?php 
}
 add_action('wp_head','gbox_style_add',99);
endif;

 if ( ! function_exists( 'gbox_scripts_add' ) ) :
 function gbox_scripts_add(){
  if($Lightbox = get_option('Lightbox_settings')){
$Lightbox = get_option('Lightbox_settings');
}
$loader_on = isset( $Lightbox['loader_on'] ) ? $Lightbox['loader_on'] : 'yes'; 
$overlayColor = isset( $Lightbox['overlayColor'] ) ? $Lightbox['overlayColor'] : '#ff0000'; 
$overlayOpacity = isset( $Lightbox['overlayOpacity'] ) ? $Lightbox['overlayOpacity'] : 60; 
$fadeSpeed = isset( $Lightbox['fadeSpeed'] ) ? $Lightbox['fadeSpeed'] : 300; 
$useCaption = isset( $Lightbox['useCaption'] ) ? $Lightbox['useCaption'] : 'yes'; 
$useNav = isset( $Lightbox['useNav'] ) ? $Lightbox['useNav'] : 'yes'; 
  ?>
	<script type="text/javascript">
		(function ($) {
			"use strict";
			$(document).ready(function(){
					var foo = $('.gallery-box');
						foo.poptrox({
							usePopupCaption: <?php if($useCaption=='yes'): ?>true<?php else: ?>false<?php endif; ?>,
							fadeSpeed:       <?php echo esc_attr($fadeSpeed); ?>,
							overlayColor:   '<?php echo esc_attr($overlayColor); ?>',
							usePopupLoader:   <?php if($loader_on=='yes'): ?>true<?php else: ?>false<?php endif; ?>,
							overlayOpacity:   0.<?php echo esc_attr($overlayOpacity); ?>,
							usePopupCloser:    false,
							usePopupNav:        <?php if($useNav=='yes'): ?>true<?php else: ?>false<?php endif; ?>,
						});

			  });
		}(jQuery));	
    </script>
<?php 
}
 add_action('wp_footer','gbox_scripts_add',99);
endif;
