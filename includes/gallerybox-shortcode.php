<?php 
/*
 * @link              http://themeforest.digitalkroy.com/gallery-box/
 * @since             1.0.0
 * @package           Gallery box wordpress plugin    
 * description        All gallery output by this shortcode
 *
 * @ Gallery box
 */
 
if ( ! function_exists( 'ngalleryBox_shortcode' ) ) : 
function ngalleryBox_shortcode($atts, $content = null){
ob_start();
    $gallery_box = shortcode_atts( array(
        'id'=> '',
    ), $atts );

	//Query args
	$args = array(
		'post_type'  		=>	'gallery_box',
		'post_status'  		=>	'publish',
		'posts_per_page' 	=> 1,
		 'p'                => $gallery_box['id']
		
	);
	//start WP_Query
	$loop= new WP_Query($args);
	 $number=1;

?>
	
	<?php if ($loop -> have_posts() ) : ?>
<div id="boxGallery" class="Gallery-container gallery-box">
	<?php while ( $loop->have_posts()) :  $loop->the_post(); 
	global $post;?>
			<!-- Regular images -->
		<?php
		if(get_post_meta(get_the_ID(), 'img_main', true)):
		$img_group = get_post_meta(get_the_ID(), 'img_main', true);
		//setting options
		 if($Gimage = get_option('img_style')){
		$Gimage = get_option('img_style');
		}
		$img_column = ( isset( $Gimage['img_column'] ) ) ? $Gimage['img_column'] : 2;
		if($img_column == 4 ){
		$gallery_image_size ='medium';
		$gbox_default_img = plugin_dir_url( dirname( __FILE__ ) ) . 'images/image-small.jpg';

		}elseif($img_column == 3){
		$gallery_image_size ='gBox-medium';
		$gbox_default_img = plugin_dir_url( dirname( __FILE__ ) ) . 'images/image-gallery.jpg';
		}else{
		$gallery_image_size ='gBox-large';
		$gbox_default_img = plugin_dir_url( dirname( __FILE__ ) ) . 'images/image-large.jpg';
		}
		$img_animation = ( isset( $Gimage['img_animation'] ) ) ? $Gimage['img_animation'] : 'ehover1'; //end setting options
		sort($img_group);
		foreach ( (array) $img_group as  $key =>$img_main ):

		$image_title =  !empty( $img_main['image_title'])  ? $img_main['image_title'] : __('Image gallery','gbox');
		$img_caption =  !empty( $img_main['img_caption'])  ? $img_main['img_caption'] : $image_title ;
		$image_small = isset($img_main['image_small_id']) ? wp_get_attachment_image_src($img_main['image_small_id'], $gallery_image_size ):''; 
		$image_light = isset($img_main['image_light_id']) ? wp_get_attachment_image_src($img_main['image_light_id'], 'large' ):'';
		
		$img_btn_text =  !empty( $img_main['img_btn_text'])   ? $img_main['img_btn_text'] :__('View large','gbox');
		
			if($image_small){
			$gallery_image = $image_small[0];
			}
			else{
			$gallery_image = $gbox_default_img;
			}
		?>
		<div class="gcolumn-<?php echo esc_attr($img_column); ?> images-gallery hover <?php echo esc_attr($img_animation); ?>">
		<a href="<?php if($image_light){echo esc_url($image_light[0]);}else{echo esc_url($gallery_image);} ?>">
		<img src="<?php echo esc_url($gallery_image); ?>" alt="<?php echo esc_attr($img_caption); ?>"  height="<?php if(!empty($image_small[2])){echo esc_attr( $image_small[2]);} ?>" width="<?php if(!empty($image_small[1])){ echo esc_attr( $image_small[1]); } ?>" title="<?php echo esc_attr($img_caption); ?>"/>
			<div class="overlay">
				<h2 class="you-title"><?php echo esc_html($image_title); ?></h2>
				<button class="info">
					<?php echo esc_html($img_btn_text); ?> 
				</button>
			</div>	
		</a>
		</div><!--# Regular images -->
		<?php
		endforeach;
		endif;
		?>
	
	<?php if(get_post_meta(get_the_ID(), 'youtube_main', true)):
		$youtube_group = get_post_meta(get_the_ID(), 'youtube_main', true);
		//setting options
		 if($Gyoutube = get_option('youtube_style')){
		$Gyoutube = get_option('youtube_style');
		}
		$youtube_column = isset( $Gyoutube['youtube_column'] ) ? $Gyoutube['youtube_column'] : 2;
		if($youtube_column == 2 ){
		$you_image_size ='gBox-large';
		}elseif($youtube_column == 3){
		$you_image_size ='gBox-medium';
		}else{
		$you_image_size ='medium';
		}
		$you_animation = isset( $Gyoutube['you_animation'] ) ? $Gyoutube['you_animation'] : 'ehover13'; //end setting options
		sort($youtube_group);
		foreach ( (array) $youtube_group as $key => $youtube_main ):
		$You_title = !empty( $youtube_main['you_title']) ? $youtube_main['you_title'] : __('Youtube gallery','gbox');
		$You_caption = !empty( $youtube_main['You_caption']) ? $youtube_main['You_caption'] : $You_title;
		$you_image = isset($youtube_main['you_image_id']) ? wp_get_attachment_image_src($youtube_main['you_image_id'], $you_image_size ):'' ;
		$you_id = isset( $youtube_main['you_id']) ? $youtube_main['you_id'] :''; 
		$you_width = !empty( $youtube_main['you_width'])  ? $youtube_main['you_width'] :'600'; 
		$you_height = !empty( $youtube_main['you_height']) ? $youtube_main['you_height'] :'400'; 
		$youtube_button = !empty( $youtube_main['youtube_button']) ? $youtube_main['youtube_button'] :__('Show video','gbox'); 
		?>
		<!-- YouTube gallery -->

		<div class="gcolumn-<?php echo esc_attr($youtube_column); ?> You-gallery hover <?php echo esc_attr($you_animation); ?>">
			<a href="<?php echo esc_url('//youtu.be/'.$you_id); ?>" data-poptrox="youtube,<?php echo esc_attr($you_width); ?>x<?php echo esc_attr($you_height); ?>">
			<?php if ($you_image): ?>
			<img src="<?php echo esc_url($you_image[0]);?>" 
			 alt="<?php the_title(); ?>" height="<?php echo esc_attr( $you_image[2]); ?>" width="<?php echo esc_attr( $you_image[1]); ?>"  title="<?php echo esc_attr($You_caption); ?>" />
			 <?php else: ?>
			 <img src="<?php echo esc_url('//img.youtube.com/vi/'.$you_id.'/0.jpg');?>" 
			 alt="<?php the_title(); ?>" title="<?php echo esc_attr($You_caption); ?>" />
			 <?php endif; ?>
				<div class="overlay you-overlay">
					<h2 class="youtube-title"><?php echo esc_html($You_title); ?></h2>
					<button class="info youtube-btn">
						<?php echo esc_html($youtube_button); ?>
					</button>
				</div>
			</a>
		</div><!--# YouTube gallery -->
		<?php
		endforeach;
		endif;
		?>
		<!-- Vimeo gallery -->
		<?php 
		if(get_post_meta(get_the_ID(), 'vimeo_main', true)):
		$vimeo_group = get_post_meta(get_the_ID(), 'vimeo_main', true);
		 if($Gvimeo = get_option('vimeo_style')){
		$Gvimeo = get_option('vimeo_style');
		}
		$vimeo_column =  isset( $Gvimeo['vimeo_column'] )  ? $Gvimeo['vimeo_column'] : 2;
		if($vimeo_column == 4 ){
		$vimeo_image_size ='medium';
		$vimg_size ='medium';
		}elseif($vimeo_column == 3){
		$vimeo_image_size ='gBox-medium';
		$vimg_size ='large';
		}else{
		$vimeo_image_size ='gBox-large';
		$vimg_size ='large';
		}
		$vimeo_animation = isset( $Gvimeo['vimeo_animation'] )  ? $Gvimeo['vimeo_animation'] : 'ehover3'; //end setting options
		sort($vimeo_group);
		foreach ( (array) $vimeo_group as $key => $vimeo_main ):
		$vimeo_title = !empty( $vimeo_main['vimeo_title'])   ? $vimeo_main['vimeo_title'] :__('Vimeo title');
		$vimeo_caption = !empty( $vimeo_main['vimeo_caption'])   ? $vimeo_main['vimeo_caption'] : $vimeo_title;
		$vimeo_image = isset($vimeo_main['vimeo_image_id']) ? wp_get_attachment_image_src($vimeo_main['vimeo_image_id'], $vimeo_image_size ):'' ;
		$vimeo_id = !empty( $vimeo_main['vimeo_id'])  ? $vimeo_main['vimeo_id'] :''; 
		$vim_width = !empty( $vimeo_main['vim_width'])  ? $vimeo_main['vim_width'] :'600'; 
		$vim_height = !empty( $vimeo_main['vim_height'])  ? $vimeo_main['vim_height'] :'400'; 
		$vimeo_button = !empty( $vimeo_main['vimeo_button'])  ? $vimeo_main['vimeo_button'] :__('Show video','gbox'); 
		if(!empty($vimeo_id )){
		$vimg_default = unserialize(file_get_contents('http://vimeo.com/api/v2/video/'.$vimeo_id.'.php'));
		}else{ 
		$vimg_default ='';
		}
		?>

		<div class="gcolumn-<?php echo esc_attr($vimeo_column); ?> Vimeo-gallery hover <?php echo esc_attr($vimeo_animation); ?>">
		<a href="<?php echo esc_url('//vimeo.com/'.$vimeo_id); ?>" data-poptrox="vimeo,<?php echo esc_attr($vim_width); ?>x<?php echo esc_attr($vim_height); ?>">
			<?php if ($vimeo_image): ?>
			<img src="<?php echo esc_url($vimeo_image[0]);?>" alt="<?php echo esc_attr($vimeo_caption);?>" height="<?php echo esc_attr( $vimeo_image[2]); ?>" width="<?php echo esc_attr( $vimeo_image[1]); ?>"  title="<?php echo esc_attr($vimeo_caption);?>" />
			 <?php else: ?>
			 <img src="<?php echo esc_url($vimg_default[0]['thumbnail_'.$vimg_size]);?>" alt="<?php echo esc_attr($vimeo_caption);?>" title="<?php echo esc_attr($vimeo_caption);?>" />
			 <?php endif; ?>
		<div class="overlay">
			<h2><?php echo esc_html($vimeo_title); ?></h2>
			<button class="info">
				<?php echo esc_html($vimeo_button); ?>
			</button>
		</div>
		</a>
		</div><!--# Vimeo gallery -->
		
		<?php
		endforeach;
		endif;
		?>
		<!-- Soundcloud: Must be in share format -->
		<?php 
		if(get_post_meta(get_the_ID(), 'Soundcloud_main', true)):
		$Soundcloud_group = get_post_meta(get_the_ID(), 'Soundcloud_main', true);
		 if($GSound = get_option('Soundcloud_style')){
		$GSound = get_option('Soundcloud_style');
		}
		$soundcloud_column =  isset( $GSound['soundcloud_column'] ) ? $GSound['soundcloud_column'] : 2; 
		if($soundcloud_column == 4 ){
		$sound_image_size ='medium';
		$soundcloud_defailt_img = plugin_dir_url( dirname( __FILE__ ) ) . 'images/soundcloud-small.jpg';
		}elseif($soundcloud_column == 3){
		$sound_image_size ='gBox-medium';
		$soundcloud_defailt_img = plugin_dir_url( dirname( __FILE__ ) ) . 'images/soundcloud.jpg';
		}else{
		$sound_image_size ='gBox-large';
		$soundcloud_defailt_img = plugin_dir_url( dirname( __FILE__ ) ) . 'images/soundcloud-large.jpg';
		}
		$sound_animation =  isset( $GSound['sound_animation'] ) ? $GSound['sound_animation'] : 'ehover4'; //end setting options
		sort($Soundcloud_group);
		foreach ( (array) $Soundcloud_group as $key => $Soundcloud_main ):
		$Sound_title =  !empty( $Soundcloud_main['sound_title']) ? $Soundcloud_main['sound_title'] : __('Soundcloud title');
		$Sound_caption =  !empty( $Soundcloud_main['Sound_caption']) ? $Soundcloud_main['Sound_caption'] : $Sound_title;
		$sound_image = isset($Soundcloud_main['sound_image_id']) ? wp_get_attachment_image_src($Soundcloud_main['sound_image_id'], $sound_image_size ):'' ;
		$sound_id =  !empty( $Soundcloud_main['sound_id']) ? $Soundcloud_main['sound_id'] :''; 
		$Soundcloud_btn = !empty( $Soundcloud_main['Soundcloud_btn']) ? $Soundcloud_main['Soundcloud_btn'] :__('Listen song','gbox'); 
		?>
		<div class="gcolumn-<?php echo esc_attr($soundcloud_column); ?> Sound-gallery hover <?php echo esc_attr($sound_animation); ?>">
		<a href="<?php echo esc_url('//api.soundcloud.com/tracks/'.$sound_id); ?>" data-poptrox="soundcloud">
		<?php if ($sound_image): ?>
			<img src="<?php echo esc_url($sound_image[0]); ?>" alt="<?php echo esc_attr($Sound_caption); ?>" height="<?php echo esc_attr( $sound_image[2]); ?>" width="<?php echo esc_attr( $sound_image[1]); ?>"  title="<?php echo esc_attr($Sound_caption); ?>" />
			 <?php else: ?>
			 <img src="<?php echo esc_url($soundcloud_defailt_img);?>" alt="<?php echo esc_attr($Sound_caption); ?>" title="<?php echo esc_attr($Sound_caption); ?>" />
		<?php endif; ?>

			<div class="overlay">
				<h2><?php echo esc_html($Sound_title); ?></h2>
				<button class="info">
					<?php echo esc_html($Soundcloud_btn); ?>
				</button>
			</div>
		</a>
		</div><!--# Soundcloud gallery -->
		
		<?php
		endforeach;
		endif;
		?>
		<!-- IFRAME: Link straight to whatever page you want to open -->
		<?php 
		if(get_post_meta(get_the_ID(), 'iframe_main', true)):
		$iframe_group = get_post_meta(get_the_ID(), 'iframe_main', true);
		 if($Giframe = get_option('iframe_style')){
		$Giframe = get_option('iframe_style');
		}
		$iframe_column = isset( $Giframe['iframe_column'] ) ? $Giframe['iframe_column'] : 2;
		if($iframe_column == 4 ){
		$iframe_image_size ='medium';
		$iframe_defailt_img = plugin_dir_url( dirname( __FILE__ ) ) . 'images/iframe-small.jpg';
		}elseif($iframe_column == 3){
		$iframe_image_size ='gBox-medium';
		$iframe_defailt_img = plugin_dir_url( dirname( __FILE__ ) ) . 'images/image-gallery.jpg';
		}else{
		$iframe_image_size ='gBox-large';
		$iframe_defailt_img = plugin_dir_url( dirname( __FILE__ ) ) . 'images/image-large.jpg';
		}		
		$iframe_animation = isset( $Giframe['iframe_animation'] ) ? $Giframe['iframe_animation'] : 'ehover5'; //end setting options
		sort($iframe_group);
		foreach ( (array) $iframe_group as $key => $iframe_main ):
		
		$iframe_title = !empty( $iframe_main['iframe_title']) ? $iframe_main['iframe_title'] : __('iframe title','gbox');
		$iframe_caption = !empty( $iframe_main['iframe_caption']) ? $iframe_main['iframe_caption'] : $iframe_title ;
		
		$Iframe_image = isset($iframe_main['Iframe_image_id']) ? wp_get_attachment_image_src($iframe_main['Iframe_image_id'], $iframe_image_size ):'' ;


		$iframe_url = !empty( $iframe_main['iframe_url']) ? $iframe_main['iframe_url'] : get_home_url(); 
		
		$iframe_width = !empty( $iframe_main['iframe_width']) ? $iframe_main['iframe_width'] :'600'; 
		
		$iframe_height = !empty( $iframe_main['iframe_height']) ? $iframe_main['iframe_height'] :'400';
		
		$iframe_button = !empty( $iframe_main['iframe_button']) ? $iframe_main['iframe_button'] :__('Show all','gbox'); 
		?>
		<div class="gcolumn-<?php echo esc_attr($iframe_column); ?> iframe-gallery hover <?php echo esc_attr($iframe_animation); ?>">
		<a href="<?php echo esc_url($iframe_url); ?>" data-poptrox="iframe,<?php echo esc_attr($iframe_width); ?>x<?php echo esc_attr($iframe_height); ?>">
		<?php if ($Iframe_image): ?>
			<img src="<?php echo esc_url($Iframe_image[0]);?>" alt="<?php echo esc_attr($iframe_caption); ?>" height="<?php echo esc_attr( $Iframe_image[2]); ?>" width="<?php echo esc_attr( $Iframe_image[1]); ?>"  title="<?php echo esc_attr($iframe_caption); ?>" />
			 <?php else: ?>
			 <img src="<?php echo esc_url($iframe_defailt_img);?>" alt="<?php echo esc_attr($iframe_caption); ?>" title="<?php echo esc_attr($iframe_caption); ?>" />
		<?php endif; ?>
			<div class="overlay">
				<h2><?php echo esc_html($iframe_title); ?></h2>
				<button class="info">
					<?php echo esc_html($iframe_button); ?>
				</button>
			</div>
		</a>
		</div><!--# IFRAME gallery -->
		<?php
		endforeach;
		endif;
		?>
		

<?php endwhile; ?> 
	</div>
<?php wp_reset_postdata(); ?>
 <?php else: ?>
 <div class="gbox-error">
 <?php esc_html_e('No gallery item found!','gbox'); ?>
 </div>
 <?php endif; ?>

 <?php 
 $galleryBox = ob_get_clean(); 
return $galleryBox;
}
add_shortcode('GalleryBox','ngalleryBox_shortcode');
endif;

//single Youtube video shortcode
if ( ! function_exists( 'n_single_youtube_gbox' ) ) : 
function n_single_youtube_gbox( $atts, $content = null ) {
    $g_youtube = shortcode_atts( array(
        'id' => 'CXkl1FgeM7M',
        'height' => 300,
        'width' => 800,
        'caption' => __('simple Youtube video','gbox')
       
    ), $atts );
	$youtube_url='//youtu.be/'.$g_youtube['id'];
	$youtube_img_url='//img.youtube.com/vi/'.$g_youtube['id'].'/0.jpg';
	return '<div class="gallery-box"><a href="'.esc_url($youtube_url).'" data-poptrox="youtube,'.esc_attr($g_youtube['width']).'x'.esc_attr($g_youtube['height']).'"><img src="'.esc_url($youtube_img_url).'"  width="'.esc_attr($g_youtube['width']).'" height="'.esc_attr($g_youtube['height']).'" alt="'.esc_attr($g_youtube['caption']).'" title="'.esc_attr($g_youtube['caption']).'" /></a></div>';
}
add_shortcode('gbox_youtube','n_single_youtube_gbox');
endif;

//single Vimeo video shortcode
if ( ! function_exists( 'n_single_vimeo_gbox' ) ) : 
function n_single_vimeo_gbox( $atts, $content = null ) {
    $g_vimeo = shortcode_atts( array(
        'id' => '121840700',
        'height' => 400,
        'width' => 800,
        'caption' => __('simple Vimeo video','gbox')
    ), $atts );
	$vimeo_url='//vimeo.com/'.$g_vimeo['id'];
	$vimeo_img_url='//i.vimeocdn.com/video/'.$g_vimeo['id'].'_640.jpg';
	return '<div class="gallery-box"><a href="'.esc_url($vimeo_url).'" data-poptrox="vimeo,'.esc_attr($g_vimeo['width']).'x'.esc_attr($g_vimeo['height']).'"><img src="'.esc_url($vimeo_img_url).'"  width="'.esc_attr($g_vimeo['width']).'" height="'.esc_attr($g_vimeo['height']).'" alt="'.esc_attr($g_vimeo['caption']).'" title="'.esc_attr($g_vimeo['caption']).'" /></a></div>';
}
add_shortcode('gbox_vimeo','n_single_vimeo_gbox');
endif;


